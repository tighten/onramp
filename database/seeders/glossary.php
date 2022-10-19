<?php

namespace Database\Seeders;

return [
    [
        'name' => [
            'en' => 'Collections',
            'pt_pt' => 'Coleções',
        ],
        'description' => [
            'en' => 'A Laravel Collection is a convenient wrapper around arrays, providing methods for manipulating the array data in useful ways.',
            'pt_pt' => 'Uma coleção no laravel é um wrapper para arrays, fornecendo métodos para manipular os dados do array de forma mais fácil.',
        ],
    ],
    [
        'name' => [
            'en' => 'HTML',
            'pt_pt' => 'HTML',
        ],
        'description' => [
            'en' => 'HTML (Hypertext Markup Language) is the primary language used to represent content on web pages. For example, it allows the the web browser to determine which parts of the content are headings, which parts are paragraph text, and which parts should be formatted as tables.',
            'pt_pt' => 'HTML (Hypertext Markup Language) é a linguagem principal usada para representar o conteúdo em páginas web. Por exemplo, permite que o navegador web determine que partes do conteúdo são títulos, que partes são texto de parágrafo e que partes devem ser formatadas como tabelas.',
        ],
    ],
    [
        'name' => [
            'en' => 'CSS',
            'pt' => 'CSS',
        ],
        'description' => [
            'en' => 'CSS (Cascading Style Sheet) is the primary language used in websites to describe the intended visual appearance of the site and its content. For example, it allows the the web browser to determine what size text should be, what color the background of a heading should be, or the spacing between two elements on the page.',
            'pt' => 'CSS (Cascading Style Sheet) é a linguagem principal usada em sites para descrever a aparência visual pretendida do site e do seu conteúdo. Por exemplo, permite que o navegador web determine o tamanho do texto, a cor do fundo de um título ou o espaçamento entre dois elementos na página.',
        ],
    ],
    [
        'name' => [
            'en' => 'Vagrant',
            'pt' => 'Vagrant',
        ],
        'description' => [
            'en' => 'Vagrant is a software program used to manage and standardize development environments. It\'s a Ruby-based configuration layer that makes it easy to provision and control hypervisors (VMWare, Parallels, HyperV, etc.) with simple configuration scripts.',
            'pt' => 'Vagrant é um programa usado para gerir e padronizar ambientes de desenvolvimento. É uma camada de configuração baseada em Ruby que facilita o provisionamento e o controlo de virtualizadores (VMWare, Parallels, HyperV, etc.) com scripts de configuração simples.',
        ],
    ],
    [
        'name' => [
            'en' => 'Homestead',
            'pt' => 'Homestead',
        ],
        'description' => [
            'en' => 'Laravel Homestead is an official, pre-set Vagrant box that is pre-configured to serve Laravel applications and mirrors Laravel Forge almost exactly.',
            'pt' => 'O Laravel Homestead é uma caixa Vagrant oficial e pré-configurada para aplicações Laravel e clona de forma muito semelhante o Laravel Forge.',
        ],
    ],
    [
        'name' => [
            'en' => 'Valet',
            'pt' => 'Valet',
        ],
        'description' => [
            'en' => 'Valet is a Laravel development environment for Mac minimalists. Using Homebrew and a few bundled applications, it serves your Laravel projects (and also those in WordPress, Statamic, and more) with almost no configuration on your end.',
            'pt' => 'O Valet é um ambiente minimalista de desenvolvimento Laravel para Mac. Usando o Homebrew e um conjunto de algumas aplicações, ele serve projetos Laravel (mas também WordPress, Statamic e outros) sem necessitar praticamente de nenhuma qconfiguração da sua parte.',
        ],
    ],
    [
        'name' => [
            'en' => 'Request lifecycle',
            'pt' => 'Request lifecycle',
        ],
        'description' => [
            'en' => "The request lifecycle describes what happens as a request (whether via HTTP or the console) comes into the Laravel application and generates a response, which is returned to the user.\n\nEach request enters the application through `public/index.php`, where Laravel is bootstrapped and the request is converted to a `Request` object. This object is passed to the kernel, and then the router, which passes it to the application's matching route closure or controller. These routes will act on the request, and then return a response, which is sent to the end user.",
            'pt' => "O 'request lifecycle' descreve o que acontece quando um pedido (seja via HTTP ou na consola) chega ao Laravel e gera uma resposta, que é devolvida ao utilizador.\n\nCada pedido entra na aplicação através de `public/index.php`, onde o Laravel é inicializado e o pedido é convertido num objeto `Request`. Este objeto é passado para o kernel e, em seguida, para o roteador, que o passa para o controlador ou encerramento de rota correspondente na aplicação. Essas rotas atuarão no pedido e devolverão uma resposta, que será enviado ao utilizdor.",
        ],
    ],
    [
        'name' => [
            'en' => 'Service Provider',
            'pt' => 'Service Provider',
        ],
        'description' => [
            'en' => 'Service providers are the heart of every Laravel application. These PHP classes contain and organize the relevant code in which the framework (and dependencies) bootstrap themselves. This includes binding classes, defining event listeners, and registering everything Laravel uses across multiple systems like middleware and routes. Service providers run at the beginning of each request; as the app boostraps, Laravel runs through each service provider listed in `app/config/app.php`. Laravel comes with core service providers, but programmers can also build our own.',
            'pt' => "Os 'Service Providers' são o coração de cada aplicação Laravel. Estas classes PHP contêm e organizam o código relevante no qual a estrutura (e dependências) se autoinicializam. Isto inclui 'binding classes', 'event listeners' e registro de tudo o que o Laravel usa em vários sistemas como 'middleware' e rotas. Os 'service providers' são executados no início de cada pedido; quando a aplicação arranca, o Laravel executa cada lista de 'service providers' em ʻapp/config/app.php`. O Laravel vem com 'service providers' básicos, mas os programadores também podem construir os seus próprios.",
        ],
    ],
    [
        'name' => [
            'en' => 'Service Container',
            'pt' => 'Service Container',
        ],
        'description' => [
            'en' => 'Laravel\'s service container, also known as the Inversion Of Control (IOC) container, Application container or Dependency Injection (DI) container, manages class dependencies and performs dependency injections. A dependency exists whenever one class uses (or depends on) another class or an interface, and it cannot do its work without them. The service container manages these dependencies and makes sure everything works as intended.',
            'pt' => 'O Service Container do Laravel, também conhecido como Inversion Of Control (IOC) container, Application container ou Dependency Injection (DI), gere as dependências de classes e executa a injeção de dependências. Existe uma dependência sempre que uma classe usa (ou depende de) outra classe ou interface e não pode executar o seu código sem eles. O Service Container gere essas dependências e garante que tudo funciona conforme esperado.',
        ],
    ],
    [
        'name' => [
            'en' => 'Helper methods',
            'pt' => 'Métodos Helper',
        ],
        'description' => [
            'en' => 'Laravel provides a large number of global functions called helpers that make some common tasks easier to perform. The list includes methods for working with strings, arrays, objects, URLs and other miscellaneous methods.',
            'pt' => 'O Laravel fornece um grande número de funções globais chamadas de Helpers que tornam algumas tarefas comuns mais fáceis de executar. A lista inclui métodos para trabalhar com strings, arrays, objetos, URLs e outros métodos.',
        ],
    ],
    [
        'name' => [
            'en' => 'CSRF Protection',
            'pt' => 'Proteção CSRF',
        ],
        'description' => [
            'en' => 'To protect your application from cross-site request forgery, which is a type of malicious exploit of a website, Laravel generates (and validates) a CSRF token for each upcoming POST request to verify the authenticated user. Simply add `@csrf` inside your `<form>` and Laravel will take care of the rest.',
            'pt' => 'Para proteger sua aplicação contra falsificação de pedidos entre sites, que é um tipo de ataque malicioso de um site, o Laravel gera (e valida) um token CSRF para cada pedido POST para verificar o utilizador autenticado. Adicione `@ csrf` dentro da tag do seu `<form>` e o Laravel cuidará do resto.',
        ],
    ],
    [
        'name' => [
            'en' => 'Blade',
            'pt' => 'Blade',
        ],
        'description' => [
            'en' => 'Blade is a templating engine provided with Laravel. While we could use plain `PHP` inside `HTML` files, the markup up would quickly become messy and hard to read. With Blade we can still loop through data in our views using `@for`, `@foreach`, `@forelse` or `@while`, echo data by using the mustache syntax `{{}}`, or display data conditionally by using clear syntax such as `@if`, `@elseif`, `@else` and `@unless`. Blade also offers many more directives and the ability to build your own, and a robust inheritance system, which make Blade a very powerful, yet easy to understand, templating language.',
            'pt' => 'Blade é o motor de templates fornecido com o Laravel. Embora pudéssemos usar `PHP` simples dentro de arquivos `HTML`, o código rapidamente se tornaria confusa e difícil de ler. Com o Blade, ainda podemos percorrer os dados das visualizações usando `@for`,`@foreach`, `@forelse` ou `@while`, exportar dados usando a sintaxe das chavetas `{{}}`, ou exibir dados condicionalmente usando sintaxe clara como `@if`, `@elseif`, `@else` e `@menos`. O Blade também oferece muito mais diretivas e a capacidade de construir as suas próprias, e um potente sistema de herança, que tornam o Blade uma linguagem de templates muito poderosa, mas fácil de entender.',
        ],
    ],
    [
        'name' => [
            'en' => 'Localization',
            'pt' => 'Localização',
        ],
        'description' => [
            'en' => 'Localization is a way to translate a website or web app to different languages, including local currencies and units of measurement. Laravel provides an easy way to retrieve strings in various languages by either using the `__` helper function or the `@lang` Blade directive. Laravel also supports pluralization for languages that have different pluralization rules.',
            'pt' => 'A localização é uma maneira de traduzir um site ou aplicação para diferentes idiomas, incluindo moedas locais e unidades de medida. O Laravel fornece uma maneira fácil de recuperar strings em várias linguagens usando a função auxiliar `__` ou a diretiva Blade `@lang`. O Laravel também suporta pluralização para linguagens que possuem regras de pluralização diferentes.',
        ],
    ],
    [
        'name' => [
            'en' => 'VueJS',
            'pt' => 'VueJS',
        ],
        'description' => [
            'en' => 'VueJS is a progressive frontend JavaScript framework for creating user interfaces, the `view` layer of the application. Its ease of use and a smooth learning curve means that Vue is a popular choice when choosing a front-end framework, so much so that Laravel provides an easy way to install and setup Vue inside Laravel app by running `php artisan ui vue` or `php artisan ui vue --auth`.',
            'pt' => 'VueJS é uma estrutura progressiva de frontend JavaScript para criar interfaces de utilizador, a camada `view` da aplicação. A sua simplicidade de uso e uma curva de aprendizem facil significa que o Vue é uma escolha popular ao escolher uma framework front-end, tanto que o Laravel fornece uma maneira fácil de instalar e configurar o Vue dentro da aplicação Laravel executando `php artisan ui vue` ou `php artisan ui vue --auth`.',
        ],
    ],
    [
        'name' => [
            'en' => 'Artisan',
            'pt' => 'Artisan',
        ],
        'description' => [
            'en' => 'Laravel\'s Artisan is a command-line tool that comes part of every Laravel application, and can be accessed by running `php artisan` from the root of any Laravel app. Artisan comes with a large list of commands that make it easy to do anything from creating models, controllers, migrating database tables or interacting with a database using the command line interface. In addition to the commands that are already provided, programmers can also create custom commands to simplify the process of interacting with each app from the command line.',
            'pt' => 'Laravel \'s Artisan é uma ferramenta de linha de comando que faz parte de todas as aplicações Laravel, e pode ser acedida executando `php artisan` a partir da raiz de qualquer aplicação Laravel. O Artisan vem com uma grande lista de comandos que tornam fácil fazer qualquer coisa, desde criar modelos, controladores, migrar tabelas de base de dados ou interagir com uma base de dados usando a interface de linha de comando. Além dos comandos que já são fornecidos, os programadores também podem criar comandos personalizados para simplificar o processo de interação com cada aplicação a partir da linha de comando.',
        ],
    ],
    [
        'name' => [
            'en' => 'Tinker',
            'pt' => 'Tinker',
        ],
        'description' => [
            'en' => 'Tinker is a REPL (Read, Evaluate, Print, Loop) interactive tool that is included with every Laravel installation. Like Ruby\'s IRB, Tinker allows programmers to interact with their Laravel application and see the output of their actions.',
            'pt' => 'Tinker é uma ferramenta interativa REPL (Read, Evaluate, Print, Loop) que está incluída em todas as instalações do Laravel. Como o IRB do Ruby, o Tinker permite que os programadores interajam com a sua aplicação Laravel e vejam o resultado imediato das suas instruções.',
        ],
    ],
    [
        'name' => [
            'en' => 'Redis',
            'pt' => 'Redis',
        ],
        'description' => [
            'en' => 'Redis (RemoteDictionaryServer) is an in-memory key-value store used as a database, cache, and a message broker. It is a no-SQL database, which means it does not use structures such like tables, rows or columns, and it does not use statements such as `SELECT`, `INSERT`, `UPDATE` or `DELETE`. Instead, it uses data structures like `strings`, `lists`, `sets`, `sorted sets`, `hashes`, `bitmaps` and others to store data. Because Redis is an in-memory database (with available persistence options), it is also very fast and therefore ideal for caching, real-time comment streams or queue jobs.',
            'pt' => 'Redis (RemoteDictionaryServer) é um armazenamento de valores-chave na memória usado como base de dados, cache e mensagens. É uma base de dados sem SQL, o que significa que não usa estruturas como tabelas, linhas ou colunas, e não usa instruções como `SELECT`, ʻINSERT`, ʻUPDATE` ou` DELETE`. Em vez disso, usa estruturas de dados como `strings`, `listas`, `conjuntos`, `conjuntos ordenados`, `hashes`, `bitmaps` entre outros para armazenar dados. Como o Redis é uma base de dados em memória (com opções de persistência disponíveis), também é muito rápido e, portanto, ideal para armazenamento em cache, fluxos em tempo real ou trabalhos em pilha.',
        ],
    ],
    [
        'name' => [
            'en' => 'Cashier',
            'pt' => 'Cashier',
        ],
        'description' => [
            'en' => 'Laravel Cashier is a package that provides an easy to use and configurable interface to various billing services, such as Stripe, Paddle or Mollie.',
            'pt' => 'Laravel Cashier é um pacote que oferece uma interface fácil de usar e configurável para diversos serviços de pagamento, como Stripe, Paddle ou Mollie.',
        ],
    ],
    [
        'name' => [
            'en' => 'Dusk',
            'pt' => 'Dusk',
        ],
        'description' => [
            'en' => 'Laravel Dusk is a browser automation and API testing package. With Dusk you can programmatically test your Laravel application or visit any website using a real Chrome browser. Dusk can automate repetitive tasks or scrape information from other websites and while Dusk uses a Chrome driver out of the box, you can use any other Selenium compatible drivers instead.',
            'pt' => 'Laravel Dusk é um pacote de automatização de testes de browser e API. Com o Dusk, pode testar programaticamente a sua aplicação Laravel ou visitar qualquer site usando o browser Chrome. O Dusk pode automatizar tarefas repetitivas ou extrair informações de outros sites e, embora o Dusk use um driver do Chrome, pode usar qualquer outro driver compatível com Selenium.',
        ],
    ],
    [
        'name' => [
            'en' => 'Envoy',
            'pt' => 'Envoy',
        ],
        'description' => [
            'en' => 'Laravel Envoy provides a clear and concise, Blade-like syntax to define common tasks run on remote servers.',
            'pt' => 'O Laravel Envoy fornece uma sintaxe clara e concisa semelhante ao Blade para definir tarefas comuns executadas em servidores remotos.',
        ],
    ],
    [
        'name' => [
            'en' => 'Horizon',
            'pt' => 'Horizon',
        ],
        'description' => [
            'en' => 'Horizon is a dashboard and configuration package for Laravel-powered Redis queues. Redis (RemoteDictionaryServer) is an in-memory key-value store used as a database, cache, and a message broker and Horizon makes it easy to monitor key metrics, for example, the health, performance, failures or history of any queue system in your Laravel application.',
            'pt' => 'Horizon é um painel e pacote de configuração para pilhas Redis em Laravel. Redis (RemoteDictionaryServer) é um armazenamento de valores-chave na memória usado como base de dados, cache e mensagens, e o Horizon facilita a monitorização das principais métricas, por exemplo, integridade, desempenho, falhas ou histórico de qualquer sistema de pilha na sua aplicação Laravel.',
        ],
    ],
    [
        'name' => [
            'en' => 'Passport',
            'pt' => 'Passport',
        ],
        'description' => [
            'en' => 'Laravel Passport is a package to authenticate APIs. Due to the unique nature of APIs as they typically use tokens to authenticate users and do not maintain session state between requests, authenticating APIs has not always been straightforward. Laravel Passport makes it possible by implementing an OAuth2 server inside your Laravel application.',
            'pt' => 'Laravel Passport é um pacote para autenticar APIs. Devido à natureza única das APIs, ue normalmente usam tokens para autenticar utilizadores e não mantêm o estado da sessão entre os pedidos, a autenticação de APIs nem sempre foi simples. O Laravel Passport torna isso possível implementando um servidor OAuth2 dentro da sua aplicação Laravel.',
        ],
    ],
    [
        'name' => [
            'en' => 'Scout',
            'pt' => 'Scout',
        ],
        'description' => [
            'en' => 'Laravel Scout is a full-text search package that uses an Algolia driver under the hood. However, it is possible to write a custom driver and extend Scout with your own search implementation, which makes Laravel Scout a great solution for any text-search related needs.',
            'pt' => 'Laravel Scout é um pacote de pesquisa de texto completo que usa um driver Algolia sob o capô. No entanto, é possível escrever um driver personalizado e extender o Scout com uma implementação de pesquisa própria, o que torna o Laravel Scout uma ótima solução para qualquer necessidade relacionada à pesquisa de texto.',
        ],
    ],
    [
        'name' => [
            'en' => 'Socialite',
            'pt' => 'Socialite',
        ],
        'description' => [
            'en' => 'Laravel Socialite is a package that makes it easy to set up and use OAuth authentication in a Laravel application.',
            'pt' => 'Laravel Socialite é um pacote que facilita a configuração e o uso da autenticação OAuth numa aplicação Laravel.',
        ],
    ],
    [
        'name' => [
            'en' => 'Telescope',
            'pt' => 'Telescope',
        ],
        'description' => [
            'en' => 'Laravel Telescope is a debug assistant package that allows to debug and monitor various aspects of Laravel application, such as exceptions, notifications, scheduled tasks, variable dumps and others.',
            'pt' => 'Laravel Telescope é um pacote assistente de depuração que permite depurar e monitorar vários aspectos da aplicação Laravel, como exceções, notificações, tarefas agendadas, exportação de variáveis entre outros.',
        ],
    ],
     [
         'name' => [
            'en' => 'Echo',
            'pt' => 'Echo',
         ],
         'description' => [
            'en' => 'Laravel Echo is a JavaScript library for event broadcasting. It makes it easy to handle authentication, authorization and subscribing to channels and listen for event broadcasts. Because Laravel Echo is a Javascript library, it needs to be installed via NPM package manager.',
            'pt' => 'Laravel Echo é uma biblioteca JavaScript para transmissão de eventos. Facilita o manuseamento da autenticação, autorização, assinatura de canais e a escuta de eventos. Como o Laravel Echo é uma biblioteca Javascript, ele precisa ser instalado via gestor de pacotes NPM.',
         ],
     ],
    [
        'name' => [
            'en' => 'Vapor',
            'pt' => 'Vapor',
        ],
        'description' => [
            'en' => 'Laravel Vapor is an auto-scaling, serverless deployment platform developed specifically for Laravel, powered by AWS Lambda.',
            'pt' => 'Laravel Vapor é uma plataforma de implantação sem servidor com escalonamento automático, desenvolvida especificamente para Laravel, com tecnologia da AWS Lambda.',
        ],
    ],
    [
        'name' => [
            'en' => 'Forge',
            'pt' => 'Forge',
        ],
        'description' => [
            'en' => 'Laravel Forge is a server provisioning and management tool for PHP applications. Server provisioning is the process of setting up a server and making it ready to be used. This includes installing and configuring all necessary software and applications, connecting it to middleware, networks and storage and finally deploying the application. Laravel Forge makes this process as well as the management of the server easy and convenient.',
            'pt' => 'Laravel Forge é uma ferramenta de aprovisionamento e gestão de servidor para aplicações PHP. O aprovisionamento de servidor é o processo de configurar um servidor e torná-lo pronto para ser usado. Este processo inclui instalar e configurar todas as aplicações necessárias, conectá-las ao middleware, redes, armazenamento e, finalmente, implementar a aplicação. O Laravel Forge torna este processo assim como o gestão do servidor fácil e conveniente.',
        ],
    ],
    [
        'name' => [
            'en' => 'Nova',
            'pt' => 'Nova',
        ],
        'description' => [
            'en' => 'Laravel Nova is an administration dashboard that is known for its great design and the ability to administer the app\'s database records using Eloquent, the Laravel ORM (Object-Relational Mapping).',
            'pt' => 'O Laravel Nova é um painel de administração conhecido por seu excelente design e capacidade de administrar os registros da base de dados da aplicação, utilizando o Eloquent, o Laravel ORM (Object-Relational Mapping).',
        ],
    ],
    [
        'name' => [
            'en' => 'Lumen',
            'pt' => 'Lumen',
        ],
        'description' => [
            'en' => 'Lumen is a free, API-focused microframework built by Laravel. Its incredible speed makes it one of the fastest microframeworks on the market, and because it is powered by Laravel\'s components, it is very easy to upgrade your Lumen application to a full Laravel application.',
            'pt' => 'Lumen é uma micro framework gratuita focada numa API desenvolvida pelo Laravel. Com uma velocidade incrível torna-se um das micro frameworks mais rápidas do mercado e, por ser movida por componentes do Laravel, é muito fácil atualizar a aplicação Lumen para uma aplicação Laravel completa.',
        ],
    ],
    [
        'name' => [
            'en' => 'Spark',
            'pt' => 'Spark',
        ],
        'description' => [
            'en' => 'Spark is a software as a service (SaaS) application scaffolding. Using Spark in your application makes it easy to set up many common features of web applications such as subscriptions, invoices, team billing, user impersonation and many others.',
            'pt' => 'Spark é um scaffolding de aplicação como serviço (SaaS). O uso do Spark na sua aplicação facilita a configuração de muitos recursos comuns de aplicações web, como assinaturas, faturas, cobranças, alterego de utilizadores e muitos outros.',
        ],
    ],
    // @todo React
    // @todo Envoyer
    // @todo Sanctum
    // @todo Anything else missing from the Laravel ecosystem?
];
