var config          = {};
config.host         = 'http://10.54.180.137:9200';
config.indexes      = ['ph0','ph1','ph2','ph3','ph4','ph6','ph7'];
    var resultados_busqueda = {};

  var procesarResultados = function(resultados, title, index)
    {   
        resultados.title = title;
        resultados.index = index;
        if( resultados.hits.max_score != null)
            {resultados.hits.max_score = resultados.hits.max_score.toFixed(2);}

        $(resultados.hits.hits).each(function(index, value)
        {
            value.porcentaje       = ((value._score/resultados.hits.max_score)*100).toFixed(2);
            value._score           = value._score.toFixed(3);
            if(value.porcentaje<$("#filtro").val())
            {

                delete resultados.hits.hits[index];
                resultados.hits.hits.length--;
                return;
            }
            resultados.hits[index] = value;
        });
        
        //console.log(resultados);
        return resultados;
    }

var Buscar = function(){
    resultados_busqueda = {};
    var to_search = $('#a_buscar').val();
    to_search     = to_search.split("\n");
    var html      = $('#tpl_item').html();
    var nav       = $('#tpl_nav').html();
    var type      = 'persona';
    var bar       = $('#cargando');
    var viewport  = $('#resultados');
    var view_term = $('#tpl_section').html();

    var terms     = [];
    $(to_search).each(function(index,value){
        terms[index] = {index_term: index, nombre: value};
    });
    $('#tab_nav').empty().append(
        Mustache.render(nav,  {terminos: terms})
        );
    $('#tab_nav li').eq(0).addClass('active');
    viewport.empty();
    bar.show();
    
    var exeBusqueda = function (qstr) {
        bar.show();
        $(config.indexes).each(function(k, index){
            ejs.Request({indices: index, types: type})
               .query(ejs.QueryStringQuery(qstr || '*'))
               .doSearch(  function(results)
                    {irResultados(results, qstr, index);}
                );
        });

    };

  
    // renders the results page
    var irResultados = function (results, title, index) {
        bar.hide();
        if( resultados_busqueda[title] == undefined) resultados_busqueda[title] = [];
        var render = Mustache.render(html,procesarResultados(results, title, index));
        resultados_busqueda[title].push({vista: render});
    };

    $(to_search).each(function(index, value){
        exeBusqueda(value);
        //$('#resultados div').eq(0).show();
    });
            setTimeout(function(){
                $(to_search).each(function(k,v){
                    var vista_final = Mustache.render(view_term, {index: k,resultados:resultados_busqueda[v]});
                    $('#resultados').append(vista_final);

                });
                $('.resultados_terms').eq(0).show()
            },2000);
    
};


var tab = function(tab_sel)
{
    $('#tab_nav li.active').removeClass('active');
    $(tab_sel).parent().addClass('active');
    $('.tab_terms').hide();
    $('#div_term_'+$(tab_sel).attr('data-term')).show();
}

$('#btn_buscar').on('click', Buscar);
$('#filtro').on('change', function(){$("#label_filtro").html($("#filtro").val())});
ejs.client = ejs.jQueryClient(config.host);
