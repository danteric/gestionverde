        /**
        <script type="text/javascript" src="/js/elastic.min.js"></script>
        <script type="text/javascript" src="/js/elastic-jquery-client.min.js"></script>
        ------------------------------------------------------------------------
        La grilla de consulta tiene como columnas : columna:etiqueta a mostrar
        POSITIVO                :  ‘S’/’N’  mostrar como check Box editable
        LIDE_PROCE_NRO : No mostrar esta columna, es solo para uso del sistema 
        LIDE_EMPR_CODIGO: No mostrar esta columna, es solo para uso del sistema 
        LIDE_ENTI_CODIGO: No mostrar esta columna, es solo para uso del sistema 
        LIDE_LINO_CODIGO : No mostrar esta columna, es solo para uso del sistema
        Lista                            : Lista ( longitud = 5)
        LINF_CODIGO,                     : Id de la lista
        LINF_ENTIDAD                     : Apellido/Razon Informado
        LINF_NOMBRE                      : Nombre
        ENTI_CLIENTE_SIST_EXT            : Cliente
        ENTI_RAZON_SOCIAL                : Razon Social
        ENTI_AUTORIDAD,                  : Autoridad
        ENTI_ACCIONISTA                  : Accionista
        LINF_DETALLE
        LINF_FUENTE
        LINF_CODIGO_PADRE
        LINF_DESIGNA
        LINF_CATEG
        LINF_SUBCATEG
        LINF_POSICION
        LINF_PERTENECE
        LINF_PAIS
        LINF_FCH_EXPIRA
        LINF_FCH_EFECTIVO
        LINF_PASAPORTE
        LINF_DOCUMENTO 
        ------------------------------------------------------------------------

        El usuario seleciona opcion ‘VER’
        Si la opción es ‘VER’ significa que no se usó el motor de búsqueda , por lo tanto no se usa el SP INPUT, directamente ejecutamos : SEL_LISTA_INFORMADOS_OUTPUT_RP('admin',1,’VER’,2,null,1,:g_ref);

        --------------------------------------------------------------------------
        */

        var Buscador = function()
        {
            //ejs.client            = ejs.jQueryClient(servidor);
            //this.servidor         = servidor;
            //this.indice           = indice;
            //this.tipo             = tipo;
            this.url              = {};
            this.url.lanzar       = '/listaInformados/lanzarBusqueda';
            this.url.obtener      = '/listaInformados/obtener';
            this.url.confirmar    = '/listaInformados/confirmar';
			this.url.borrar       = '/listaInformados/borrar';
            this.url.reporte      = '/listaInformados/reporte';
            this.lista_resultados = [];
            this.lista_buscando   = [];
            this.busqueda_en_lote = [];
            this.proceso          = null;
        };
        /**
        * busco en ES
        */
        Buscador.prototype.buscar = function(b)
        {
            
            this.limpiar();
            this.buscarEnCliente(b);
            

        }

        Buscador.prototype.buscarEnCliente = function(b)
        {
            var that  = this;
            $("#spinner").show();
            var lanzandoBusquedaDfd = this.lanzarBusqueda(b);
            var yaB=[];
            var acumuladorB=[];
            var acumuladorA=[];
            var agrupador=[];
            acumuladorA.resultados=[];
            acumuladorA.buscando=[];
            lanzandoBusquedaDfd.done(

          function(resultados)
          {
                   
              var cli=true;

              if(b.operacion=="BUS")
              {
                cli=false;
              }

              if(cli)
              {
                  var lista_agrupad = {};
                  lista_agrupad.resultados = [];

                  for(i=0;i<resultados.length;i++)
                  {            
                     
                    var nombre= resultados[i].ENTI_AUTORIDAD;
                    var agregar=true;
                    if(nombre==", ")
                    {
                    
                       nombre= resultados[i].ENTI_RAZON_SOCIAL;
                       agregar=false;
                      
                    }
                    else
                    {
                       nombre= resultados[i].ENTI_AUTORIDAD;
                    }

                    if(!contiene(yaB,nombre))
                   {
                    yaB.push(nombre);
                    lista_buscando=({nom:nombre});
                    acumuladorB.push({nom:nombre});   
                   }

                   if(agregar)
                   {
                    acumuladorA.buscando.push({nom:nombre});
                   }
                     //Resultados!
                    
                     lista_agrupad.resultados=(format(resultados[i]));
                     lista_agrupad.resultados.push(format(resultados[i]));
                     lista_agrupad.buscando   = lista_buscando;
                     var temp=format(resultados[i]);
                     acumuladorA.resultados.push(temp);

                     var buscado=nombre;
                     var resultado=(resultados[i]);
                     var contenedor=[];
                     contenedor.buscado=buscado;
                     contenedor.resultado=resultado;
                     agrupador.push(contenedor);
                  
                   }

                    var limpia=agrupar(agrupador);
                    that.plantilla_buscando(acumuladorB);
                  
                   for(i=0;i<limpia.length;i++)
                   {
                     var temporal=limpia[i];              
                     that.visualizar(temporal);
                   }

             }
             else
             {
               that.plantilla_buscando({nom:b.texto});
                for(i=0;i<resultados.length;i++)
                {
                  var objeto=[];
                  objeto.resultados=format(resultados[i]);
                  that.visualizar(objeto);
                }
              }
          $("#spinner").hide();
          }

                );



            
        }


        function agrupar(agrupador)
        {

           var lista_agrupad=[];
              for(j=0;j<agrupador.length;j++)
              {
                var contenedor=[];
                 contenedor.buscando=[];
                 contenedor.resultados=[];

                var buscado=agrupador[j].buscado;
                var resultado=agrupador[j].resultado;
                if(buscado!=null&&resultado!=null)
                  {
                    contenedor.buscando.push({nom:buscado});
                for(i=j;i<agrupador.length;i++)
                {

                  var buscadoT=agrupador[i].buscado;
                  var resultadoT=agrupador[i].resultado;

                  if(buscadoT!=null&&buscado==buscadoT&&resultadoT!=null&&resultadoT!=""&&resultadoT!=" ")
                    {
                    contenedor.resultados.push(resultadoT);
                    agrupador[i].buscado=null;
                    agrupador[i].resultado=null;
                    }

                   }
                }

                if(contenedor.buscando.length!=0)
                {
                lista_agrupad.push(contenedor); 
                }   
              }
          
          return lista_agrupad;
        }
      
        Buscador.prototype.lanzarBusqueda = function(b)
        {           
			//alert(JSON.stringify(b, null, 4));
            var that = this;
            return $.post(this.url.lanzar, {busqueda:b}).done(
				function(resultado){
					//var parsedJSON = $.parseJSON(resultado);
          //alert(resultado);
					that.proceso = resultado[0].LIDE_PROCE_NRO
					//console.log(JSON.stringify("llega"+that.proceso, null, 4));
				}
			);
        }


        function contiene(a, obj) {
            for (var i = 0; i < a.length; i++) {
                if (a[i] === obj) {
                    return true;
                }
            }
            return false;
        }

        function format(resultados)
        {

                
             
            return [{

              LINF_DOCUMENTO: resultados.LINF_DOCUMENTO,  
              LINF_PASAPORTE: resultados.LINF_PASAPORTE,  
              LINF_FCH_EXPIRA: resultados.LINF_FCH_EXPIRA,  
              LINF_FCH_EFECTIVO: resultados.LINF_FCH_EFECTIVO,  
              LINF_PAIS: resultados.LINF_PAIS,
              LINF_PERTENECE: resultados.LINF_PERTENECE,
              LINF_SUBCATEG: resultados.LINF_SUBCATEG,
              LINF_DESIGNA: resultados.LINF_DESIGNA,
              LINF_CATEG: resultados.LINF_CATEG,
              LINF_NOMBRE: resultados.LINF_NOMBRE,
              LINF_ENTIDAD: resultados.LINF_ENTIDAD,
              LINF_CODIGO: resultados.LINF_CODIGO,  
              LIDE_EMPR_CODIGO: resultados.LIDE_EMPR_CODIGO, 
              LIDE_ENTI_CODIGO: resultados.LIDE_ENTI_CODIGO,
              LIDE_ENAU_ITEM: resultados.LIDE_ENAU_ITEM, 
              LIDE_LINO_CODIGO: resultados.LIDE_LINO_CODIGO,
              LIDE_PROCE_NRO: resultados.LIDE_PROCE_NRO,
              LIDE_ENAU_ITEM: resultados.LIDE_ENAU_ITEM,
              LIDE_EACC_ITEM: resultados.LIDE_EACC_ITEM,
              LIDE_ENTI_CODIGO: resultados.LIDE_ENTI_CODIGO,
              LINF_CODIGO: resultados.LINF_CODIGO,
              POSITIVO: resultados.POSITIVO, 
              ENTI_CLIENTE_SIST_EXT: resultados.ENTI_CLIENTE_SIST_EXT,
              LINF_POSICION: resultados.LINF_POSICION,
              ENTI_RAZON_SOCIAL: resultados.ENTI_RAZON_SOCIAL,
              ENTI_AUTORIDAD: resultados.ENTI_AUTORIDAD,
              ENTI_ACCIONISTA: resultados.ENTI_ACCIONISTA,
              LINF_DETALLE: resultados.LINF_DETALLE,
              LINF_FUENTE: resultados.LINF_FUENTE,
              LINF_CODIGO_PADRE: resultados.LINF_CODIGO_PADRE,
              TOTAL_PAGINAS: resultados.TOTAL_PAGINAS,
              TOTAL_REGISTROS: resultados.TOTAL_REGISTROS,
              LISTA: resultados.LISTA


                   }];

        }

       
        /**
        * Obtengo registros de sistema 
        */
        Buscador.prototype.obtener = function(lista, b, proceso, entidad)
        {
          
          if(entidad == undefined)
            {
               entidad = null;
            };    
			
            var data        = {proceso: proceso, busqueda: b, entidad: entidad};
            data.resultados = lista;
            var ret = $.post(this.url.obtener, data);
            ret.data = data;
            return ret;
        }
      
       

        /**
        *
        *nom:Nombre del buscado
        *
        */
        Buscador.prototype.plantilla_buscando = function(lista)
        {
          return $.get('/templates/listaInformados/buscando.m.html').done(function(html)
                {
                   var vars = {buscando: lista}; 
                   

                   $('#lista_buscando').html(Mustache.render(html, vars));
                });
                

        }
        /**
        * Visualizo lista de resultados de clientes
        *
        */
        Buscador.prototype.visualizar = function(valores)
        {
            var that = this.BuscadorGlobal;
           valores['resultados?'] = valores.resultados.length > 0;
            
            return $.get('/templates/listaInformados/lista.m.html').done(function(html)
                {
                  //alert(Mustache.render(html, valores));

    			   //console.log(JSON.stringify(html, null, 4));
                   $('#lista_informados').append(Mustache.render(html, valores));
                });
        }

        Buscador.prototype.limpiar = function()
        {
            $('#lista_informados').html('');
            this.lista_resultados = [];
            this.lista_buscando   = [];
            this.busqueda_en_lote = [];
            this.proceso          = null;
        }

        Buscador.prototype.confirmar = function(data)
        {
            return $.post(this.url.confirmar, data);            
        }
		Buscador.prototype.borrar = function(data)
        {
            return $.post(this.url.borrar, data);
        }
        Buscador.prototype.reporte = function(proceso)
        {
        	//alert(proceso);
        	return $.post(this.url.reporte+'?proceso='+proceso);
           // window.location.href = this.url.reporte+'?proceso='+proceso;
			//window.open((this.url.reporte+'?proceso='+proceso),5000);
			
        }

