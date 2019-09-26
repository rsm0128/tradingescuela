@extends('layouts.frontEnd')
@section('content')

    <div class="expert-section gray-bg breadcrumb-area" style="background: url('{{ asset('assets/images') }}/{{ $basic->breadcrumb }}');">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-xs-12">
                    <h3 class="breadcrumb-title"><!--{{ $page_title }}-->Preguntas Frecuentes</h3>
                    <div class="breadcrumb-wrap">
                        <ul class="breadcrumb-list">
                            <li><a href="{{ route('home') }}">Inicio </a></li>
                            <li><a href="#"><!--{{ $page_title }}-->Preguntas Frecuentes</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="expert-section gray-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="area-heading text-center">
                        <h2 class="area-title">Preguntas Frecuentes</h2>
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-md-12">
                    <ul class="faq">
                        @foreach($faqs as $faq)
                            <li>
                                <label data-toggle="collapse" data-target="#{{ $faq->id }}">{{ $faq->title }}<i class="fa fa-angle-down"></i></label>
                                <div id="{{ $faq->id }}" class="collapse">
                                    <p>{!! $faq->content !!}</p>
                                </div>
                                <!--<p id="{{ $faq->id }}" class="collapse">{!! $faq->content !!}</p>-->
                            </li>
                        @endforeach
<!--                      <li>-->
<!--                        <input type="checkbox" id="list-item-2">-->
<!--                        <label for="list-item-2">¿Cómo va a ser el acceso a telegram? <i class="fa fa-angle-down"></i></label>-->
<!--                        <p>Se hará de forma privada e individual</p>-->
<!--                      </li>-->
<!--                      <li>-->
<!--                        <input type="checkbox" id="list-item-3">-->
<!--                        <label for="list-item-3">¿Qué plataformas recomendamos para hacer trading con forex? <i class="fa fa-angle-down"></i></label>-->
<!--                        <p>Plataforma metatrader 4 es buena y brokers hay muchos por ejemplo, recomendamos XM.</p>-->
<!--                      </li>-->
<!--                      <li>-->
<!--                        <input type="checkbox" id="list-item-4">-->
<!--                        <label for="list-item-4">¿Qué conocimientos requiero para comenzar? <i class="fa fa-angle-down"></i></label>-->
<!--                        <p>Recomendamos leer nuestros artículos de consejos para triunfar y consejos para no fracasar a la hora de hacer trading. Puedes encontrarlos en nuestro blog.</p>-->
<!--                      </li>-->
<!--                      <li>-->
<!--                        <input type="checkbox" id="list-item-5">-->
<!--                        <label for="list-item-5">¿Cuál es la inversión mínima? <i class="fa fa-angle-down"></i></label>-->
<!--                        <p>La inversión mínima depende del broker que usen.</p>-->
<!--                      </li>-->
<!--                      <li>-->
<!--                        <input type="checkbox" id="list-item-6">-->
<!--                        <label for="list-item-6">¿Qué tipos de pares vamos a enviar? <i class="fa fa-angle-down"></i></label>-->
<!--                        <p>Se enviaran los pares principales que son las monedas más fuertes</p>-->
<!--                      </li><li>-->
<!--                        <input type="checkbox" id="list-item-7">-->
<!--                        <label for="list-item-7">¿Cuáles son las monedas más fuertes que analizamos? <i class="fa fa-angle-down"></i></label>-->
<!--                        <p>Euro, dólar, dólar australiano, dólar canadiense, franco suizo, yen, dólar neozelandés</p>-->
<!--                      </li>-->
<!--                      <li>-->
<!--                        <input type="checkbox" id="list-item-8">-->
<!--                        <label for="list-item-8">¿Qué es forex? <i class="fa fa-angle-down"></i></label>-->
<!--                        <p>El trading de Forex es una actividad, o incluso una profesión, abierta a cualquier persona que disponga de un ordenador y de acceso a internet. No obstante, no todos conocen realmente que es el Trading Forex.</p>-->
<!--                        <p>El término Trading o cambio se explica así mismo. Se trata de un mercado donde se cambia un producto por otro. Se puede hacer trading con infinidad de instrumentos: commodities, índices, acciones.</p>-->
<!--                        <p>El término Forex hace referencia al mercado en el que se cambian unas divisas por otras, así como otro tipo de instrumentos financieros.</p>-->
<!--                        <p>El Trading de Forex es un tipo de Trading diario y a escala internacional. Los Estados, las empresas, incluso los particulares, como tú, operan en divisa todos los días.</p>-->
<!--                        <p>Este Trading se realiza mediante redes informáticas entre los traders de todo el mundo. Ésta es la principal razón de que el mercado Forex o mercado de divisas sea el mercado más grande y líquido del mundo, el más accesible y como resultado también el que se considera más peligroso y con peor fama.</p>-->
<!--                      </li>-->
<!--                      <li>-->
<!--                        <input type="checkbox" id="list-item-9">-->
<!--                        <label for="list-item-9">¿Qúé son los PIPS? <i class="fa fa-angle-down"></i></label>-->
<!--                        <p>El Pip (Point in Percentage o punto porcentual) es el cambio más pequeño posible que puede notarse en el precio de una divisa. Dicho de otra manera, el Pip es la variación mínima que podemos observar en la cotización de un tipo de cambio o par de divisas.</p>-->
<!--                        <p>En signals, el PIP equivale a 1 dólar.</p>-->
<!--                      </li>-->
<!--                      <li>-->
<!--                        <input type="checkbox" id="list-item-10">-->
<!--                        <label for="list-item-10">¿Qué es el S&P500? <i class="fa fa-angle-down"></i></label>-->
<!--                        <p>El índice Standard & Poor's 500 también conocido como S&P 500 es uno de los índices bursátiles más importantes de Estados Unidos. Al S&P 500 se lo considera el índice más representativo de la situación real del mercado.</p>-->
<!--                      </li>-->
<!--                      <li>-->
<!--                        <input type="checkbox" id="list-item-11">-->
<!--                        <label for="list-item-11">¿Qué es STOP-LOSS y Take Profit? <i class="fa fa-angle-down"></i></label>-->
<!--                        <p><strong>Stop-loss: </strong>El stop loss se podría considerar el cinturón de seguridad del trading. Cuando cogemos el coche nunca pensamos que vamos a tener un accidente, pero nos ponemos el cinturón por si acaso. En el caso de tener un accidente, el cinturón reduce considerablemente los daños, pues el Stop Loss tiene la misma función. Cuando empezamos a hacer trading, pensamos que no nos equivocaremos nunca y ganaremos, por desgracia esto es imposible.No existe ningún trader que gane en todas sus operaciones, y si os encontráis con alguno, pedidle que os enseñe su historial de operaciones, os miente.</p>-->
<!--                        <p>Para entenderlo mejor veamos un ejemplo:</p>-->
<!--                        <p>Tenemos una cuenta con 1.000€, y hemos decidido jugarnos un 1% del capital total de la cuenta en la próxima operación, es decir, 10€.</p>-->
<!--                        <p>En esta operación, sabemos que cada pip vale, 0,5€/pip.</p>-->
<!--                        <p>Si solo queremos perder 10€ en total, y cada pip vale 0,5€/pip, hacemos la división:</p>-->
<!--                        <p>10 / 0,5 =20 pips. El precio solo puede bajar 20 pips, sino nos saltará el Stop Loss (SL).</p>-->
<!--                        <p>Compramos en EUR/JPY a 1,35200 y ponemos el STOP LOSS a 20 pips del precio de entrada, es decir a 1,35000. De repente el precio empieza a caer, 1,35140 (ya estamos a -6 pips), sigue bajando, y ahora está a 1,35080 (estamos a -12 pips), finalmente, la operación llega a 1,35000 y se cierra automáticamente al precio que le hemos dicho.</p>-->
<!--                        <p>Resultado: Nosotros queríamos jugarnos un 1% del capital, y al final hemos perdido solo 10€ (exactamente, ese 1% del capital).</p>-->
<!--                        <p>Ahora muchos diréis, ¿Cómo puedes estar contento después de haber perdido 10€? Simple, si tengo controladas mis perdidas, aseguro mi supervivencia, algo muy importante en el trading, si el precio empieza a moverse rápido, perfectamente puede caer o subir 200 pips en un par de horas. ¿Cuánto valen 200 pips a 0,5€/pips? Pues exactamente, 100€. En vez de haber perdido 10€ (1%), hubiéramos perdido 100€ (¡¡un 10% de la cuenta!!). En 6 operaciones consecutivas perdiendo un 10%, nos habremos cargado más de la mitad de la cuenta…</p>-->
<!--                        <p><strong>Take-profit: </strong>Los take profits son muy similares a los STOP LOSS, pero en vez de cerrar la posición para no perder más, este nos la cierra cuando llega a un precio objetivo (nuestra meta para esa operación) que le hemos dicho con anterioridad. De este modo podemos comprar, colocar un stop loss, un take profits e irnos a hacer lo que más nos guste, la operación se cerrará por si sola y no es necesario estar pendientes.</p>-->
<!--                        <p>Compramos a 1,35000, ponemos el STOP LOSS a -20 pips, es decir a 1,34800 y creemos que esta operación puede llegar al 1,35500, pues a ese precio ponemos el Take Profits. Si el precio llega antes a 1,35500 que al 1,34800, se cerrará automáticamente con beneficios.-->
<!--Cogiendo el precio por pip del anterior ejemplo que era de 0,5€/pip, si hacemos esta operación habremos ganado: 50 pips (1,35500-1,35000) x 0,5€/pip = 25€, jugándonos (1,35000-1,34800) x 0,5€/pip = 10€.</p>-->
<!--                        <p>La relación entre pérdidas y ganancias es de 2,5€ por cada euro que estamos dispuestos a perder, es una buena relación que a la larga nos dará buenos resultados.</p>-->
<!--                      </li>-->
<!--                      <li>-->
<!--                        <input type="checkbox" id="list-item-12">-->
<!--                        <label for="list-item-12">¿Qué son los lotes? <i class="fa fa-angle-down"></i></label>-->
<!--                        <p>Puesto que los pips son el valor más pequeño que puede aumentar una divisa, para poder aprovechar los pips necesitaría operar con grandes cantidades de una moneda en particular para poder ver una ganancia o una pérdida significativa. Un lote estándar tiene 100.000 unidades de moneda con las que se opera y un minilote tiene 10.000 unidades.</p>-->
<!--                        <p>Mientras estas cantidades están bien para bancos y proveedores de liquidez, el operador promedio nunca podría darse el lujo de operar con semejantes lotes. Por lo tanto, los agentes intermediarios de Forex introdujeron un concepto llamado apalancamiento para hacer más accesible el intercambio de divisas Forex para el operador promedio.</p>-->
<!--                      </li>-->
<!--                      <li>-->
<!--                        <input type="checkbox" id="list-item-13">-->
<!--                        <label for="list-item-13">¿Qué es el apalancamiento? <i class="fa fa-angle-down"></i></label>-->
<!--                        <p>El apalancamiento les permite a los operadores de Forex controlar una gran cantidad de dinero utilizando muy poco de su propio dinero y "pidiendo prestado" el resto. Prácticamente, lo que significa esto es que usted puede controlar más dinero en una operación de lo que tiene realmente en su cuenta de intercambio de divisas.</p>-->
<!--                        <p>Ejemplo: Si usted compra un minilote de EUR/USD, entonces la plusvalía de cuenta se incrementará o disminuirá en $1 por cada pip de movimiento. Si usted compra un lote estándar, entonces la plusvalía de su cuenta se incrementará o disminuirá en $10 por cada pip de movimiento.</p>-->
<!--                        <p>Si el par EUR/USD se incrementa en 10 pips (10 × $1) de 1,3000 a 1,3010 con minilotes, entonces esto representará un incremento de $10. Ocurre lo mismo con los lotes estándar, uno de 10 pip que se incrementa de 1,3000 a 1,3010 equivaldría a un incremento de $100.</p>-->
<!--                      </li>-->
<!--                      <li>-->
<!--                        <input type="checkbox" id="list-item-14">-->
<!--                        <label for="list-item-14">¿Qué es buy y sell orders? <i class="fa fa-angle-down"></i></label>-->
<!--                        <p>Son las órdenes que se van a realiza. Ya sea de compra o venta. Operamos comprando y vendiendo para obtener beneficios sobre las alzas y las bajas.</p>-->
<!--                      </li>-->
<!--                      <li>-->
<!--                        <input type="checkbox" id="list-item-15">-->
<!--                        <label for="list-item-15">¿Hay cursos de aprendizaje? <i class="fa fa-angle-down"></i></label>-->
<!--                        <p>Dejamos los links de algunos cursos de youtube para aprender más sobre trading.</p>-->
<!--                        <p><a>https://www.youtube.com/watch?v=jxBTorMNkYQ</a></p>-->
<!--                        <p><a>https://www.youtube.com/watch?v=GztiCFqvCWE</a></p>-->
<!--                        <p><a>https://www.youtube.com/watch?v=HcI-s661gfQ</a></p>-->
<!--                        <p>Igualmente, A través de esta plataforma tenéis acceso a los vídeos grabados por nuestros traders para enseñar el mercado de forex y cómo operar.</p>-->
<!--                      </li>-->
<!--                      <li>-->
<!--                        <input type="checkbox" id="list-item-16">-->
<!--                        <label for="list-item-16">¿Cómo mandan las señales en signals? <i class="fa fa-angle-down"></i></label>-->
<!--                        <p>GOLD SELL LIMIT 1295.00</p>-->
<!--                        <p>SL 1300.00 (STOP-LOSS)</p>-->
<!--                        <p>TP 1279.00 (TAKE-PROFIT)</p>-->
<!--                        <p>TP 1270.00 </p>-->
<!--                        <p>TP 1264.55 </p>-->
<!--                        <p>Usar su lotaje correctamente (Recordad siempre usamos lotaje de 1%)</p>-->
<!--                        <p>Siendo SL (STOP-LOSS) y TP (TAKE-PROFIT)</p>-->
<!--                      </li>-->
<!--                      <li>-->
<!--                        <input type="checkbox" id="list-item-16">-->
<!--                        <label for="list-item-16">¿Cómo introduzco una orden en MT4? <i class="fa fa-angle-down"></i></label>-->
<!--                        <p>Una orden a mercado es una instrucción para abrir una posición al precio actual de mercado.</p>-->
<!--                        <p>Hay diferentes maneras de colocar una orden a mercado en el terminal MT4:</p>-->
<!--                        <p>Haga Click en el botón ‘Nueva Orden’ en la barra ‘Standard’</p>-->
<!--                        <p>Seleccione ‘Nueva Orden’ desde ‘Herramientas’ en el menú desplegable.</p>-->
<!--                        <p>Presione F9</p>-->
<!--                        <p>Haga -click-derecho en un instrumento en la ventana ‘Observación de Mercado’ y seleccione ‘Nueva Orden</p>-->
<!--                        <p>Doble-click en un instrumento en la ventana de ‘Observación de Mercado’</p>-->
<!--                        <p>One-click trading</p>-->
<!--                        <p>Al proceder con cualquiera de las opciones detalladas anteriormente una ventana de ‘Orden’ se abrirá. Esto le permitirá ajustar los parámetros de la posición que está a punto de abrir. El campo del ‘Símbolo’ le permite cambiar el instrumento, mientras que el campo del ‘Volumen’ es donde determina el tamaño de su trade (Recordad el lotaje que usamos es del 1%). Puede de igual modo colocar un nivel de stop-loss o take-profit. Puede a continuación hacer click en ‘Vender a Mercado’ para abrir una posición corta, o ‘Comprar a Mercado’ para abrir una posición larga.</p>-->
<!--                      </li>-->
<!--                      <li>-->
<!--                        <input type="checkbox" id="list-item-17">-->
<!--                        <label for="list-item-17">¿Cuántas señales se dan al dia en Signals? <i class="fa fa-angle-down"></i></label>-->
<!--                        <p>Dependiendo del mercado, se dan de 3 a 10 señales. SIGNALS busca calidad, no cantidad.</p>-->
<!--                      </li>-->
<!--                      <li>-->
<!--                        <input type="checkbox" id="list-item-18">-->
<!--                        <label for="list-item-18">¿Cuáñ es el horario de las señales? <i class="fa fa-angle-down"></i></label>-->
<!--                        <p>El horario es de 8am de la mañana a 12am de la noche (Horario de México).</p>-->
<!--                      </li>-->
<!--                      <li>-->
<!--                        <input type="checkbox" id="list-item-19">-->
<!--                        <label for="list-item-19">¿Qué recomendaciones damos a los usuarios? <i class="fa fa-angle-down"></i></label>-->
<!--                        <p>Se recomienda que hagan TODAS las transferencias del día en el momento. Ya que algunas pueden dar negativo pero la suma de todas es 90% positivo diario.</p>-->
<!--                        <p>¿EN QUÉ GRUPOS DEBO ESTAR Y POR DÓNDE RECIBO LAS SEÑALES?</p>-->
<!--                        <p>Recibirás las señales vía telegram, email y mensaje de texto (Este último sólo si no vives en USA)</p>-->
<!--                        <p>Los grupos que debes tener en Telegram son:</p>-->
<!--                        <p>SIGNALS CLUB SOCIOS (Para hablar con los otros usuarios y preguntar).</p>-->
<!--                        <p>SIGNAL CLUB “SEÑALES” (Para recibir las señales por telegram)</p>-->
<!--                        <p>Si no estás en alguno de estos dos grupos, contacta por telegram a @saraCMO</p>-->
<!--                      </li>-->
<!--                      <li>-->
<!--                        <input type="checkbox" id="list-item-20">-->
<!--                        <label for="list-item-20">¿Qué broker uso? <i class="fa fa-angle-down"></i></label>-->
<!--                        <p>Recomendamos usar JAFX. Puedes abrir tu cuenta aquí: </p>-->
<!--                        <p><a>https://www.jafx.com</a></p>-->
<!--                        <p>No USA: </p>-->
<!--                        <p>JAFX </p>-->
<!--                        <p>XM</p>-->
<!--                        <p>IB</p>-->
<!--                        <p>USA:</p>-->
<!--                        <p>TDAmeritrade </p>-->
<!--                        <p>IB</p>-->
<!--                        <p>E*Trade </p>-->
<!--                        <p>Plataforma: MT4</p>-->
<!--                      </li>-->
<!--                      <li>-->
<!--                        <input type="checkbox" id="list-item-21">-->
<!--                        <label for="list-item-21">¿Y si estoy en USA? <i class="fa fa-angle-down"></i></label>-->
<!--                        <p>USA: </p>-->
<!--                        <p>TDAmeritrade </p>-->
<!--                        <p>IB</p>-->
<!--                        <p>E*Trade </p>-->
<!--                        <p>Plataforma: MT4</p>-->
<!--                      </li>-->
<!--                      <li>-->
<!--                        <input type="checkbox" id="list-item-22">-->
<!--                        <label for="list-item-22">¿Cuánto es el mínimo que me recomiendan ingresar para comenzar a hacer trading? <i class="fa fa-angle-down"></i></label>-->
<!--                        <p>Recomendamos comenzar con un mínimo de 100 dólares.</p>-->
<!--                      </li>-->
<!--                      <li>-->
<!--                        <input type="checkbox" id="list-item-23">-->
<!--                        <label for="list-item-23">¿Qué es el lotaje? <i class="fa fa-angle-down"></i></label>-->
<!--                        <p>Es el nivel de riesgo que estás dispuesto a aceptar. A un lotaje menor, el riesgo será menor, pero también la ganancia será menor. Nosotros operamos con un lotaje de 1% sobre tu capital para minimizar riesgos. </p>-->
<!--                      </li>-->
<!--                      <li>-->
<!--                        <input type="checkbox" id="list-item-24">-->
<!--                        <label for="list-item-24">¿Qué significa un lotaje de 1% sobre mi capital? <i class="fa fa-angle-down"></i></label>-->
<!--                        <p>Significa que deberás poner el 1% de lo que poseas.</p>-->
<!--                        <p>Ejemplo:</p>-->
<!--                        <p>Si tienes 100 dólares tu lotaje será de 0,01</p>-->
<!--                        <p>300 dólares de 0,03</p>-->
<!--                        <p>1,000 dólares de 0,1</p>-->
<!--                      </li>-->
<!--                      <li>-->
<!--                        <input type="checkbox" id="list-item-25">-->
<!--                        <label for="list-item-25">¿Qué pares son los trabajados? <i class="fa fa-angle-down"></i></label>-->
<!--                        <p>DIVISAS (USDMXN)</p>-->
<!--                        <p>INDICES (SP500)</p>-->
<!--                        <p>MATERIAS PRIMAS (ORO, WTI)</p>-->
<!--                      </li>-->
<!--                      <li>-->
<!--                        <input type="checkbox" id="list-item-26">-->
<!--                        <label for="list-item-26">¿Qué apalancamiento pongo en cada plataforma? <i class="fa fa-angle-down"></i></label>-->
<!--                        <p>Dependiendo de cada plataforma, recomendamos 1:50 / 1:500.</p>-->
<!--                      </li>-->
<!--                      <li>-->
<!--                        <input type="checkbox" id="list-item-27">-->
<!--                        <label for="list-item-27">¿Qué es el spread? <i class="fa fa-angle-down"></i></label>-->
<!--                        <p>Spread es la diferencia entre el precio de compra y el de venta de un activo financiero. Es una especie de margen que se utiliza para medir la liquidez del mercado. Generalmente márgenes más estrechos representan un nivel de liquidez más alto.</p>-->
<!--                      </li>-->
                    </ul>
           
                </div>


            </div>
        </div>
    </div>




@endsection
