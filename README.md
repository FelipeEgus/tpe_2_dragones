
-Para utilizar la base de datos, se debe importar el archivo db_dragones.

-El endpoint que se debe utilizar es:

http://localhost/tpe_2/api/dragones

para así visualizar las listas de los dragones.

-Si se quiere ver algun dragon en particular se debe poner al lado de /dragones en la url el ID del dragon que se quiere visualizar. 
Por ejemplo:

http://localhost/tpe-dos/api/dragones/1 (se mostraría el dragon clasico).

-para logearse se tiene que ingresar el user: felipe con la password: 12345 en Basic Auth con el url http://localhost/tpe_2/api/auth/token  utilizando la función GET. luego copiar el token, e ingresarlo en Bearer Token.

-para borrar se debe usar el comando DELETE, y el url es http://localhost/tpe_2/api/dragones/ y el ID para seleccionarlo.

-Para añadir se debe ir al url http://localhost/tpe_2/api/dragones/add  y se deben cumplir los espacios:

"nombre_raza"
"descrip"
"representaciones"
"id_mitologia_fk"

en "id_mitologia_fk" se debe poner la mitologia que pueder ir del 1 al 11 dependiendo a donde pertenece :

1-babilonico
2-europeo
3-grecoromano
4-prehistorico
5-egipcio	
6-asiatico
7-hindú
8-latino americano
9-nordico
10-tolkien
11-ruso

-Si se quiere ordenar, filtrar, limitar o paginar los dragones al lado de 'dragones' se debe poner un '?' y poner una de las 5 opciones: 

'sort= asc (ascendente) o desc (descendente), default: asc'

'field= elegir uno de los siguientes campos: 
id
nombre_raza 
descrip
representaciones
id_mitologia_fk

default: id'

'where= elegir una mitologia del 1 al 11 siendo:

    1-babilonico
    2-europeo
    3-grecoromano
    4-prehistorico
    5-egipcio	
    6-asiatico
    7-hindú
    8-latino americano
    9-nordico
    10-tolkien
    11-ruso

default: todos'

'limit= un número para limitar la cantidad de dragones que se toman, default: todos'

'offset= un número para indicar que en que pagina arranca el listado, default: 0'
tiene un calculo en el codigo que se encarga de tomar la pagina segun el limit

-si se quieren utilizar dos o más de estas funciones a la vez se debe poner una '&' para separarlas como ejemplo:

http://localhost/tpe_2/api/dragones?sort=asc&field=id

