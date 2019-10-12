<?php

use App\User;
use App\Module;
use Illuminate\Database\Seeder;

class ExistingContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class)->create([
            'email' => 'vincent.mitchell@gmail.com',
            'password' => bcrypt('123123')
        ]);

        $en = [
            [
                'name' => 'HTML',
                'links' => [
                    [
                        'name' => 'HTML Reference',
                        'url' => 'https://htmlreference.io/',
                        'type' => 'article'
                    ],
                    [
                        'name' => 'TraversyMedia HTML Crash Course',
                        'url' => 'https://www.youtube.com/watch?v=UB1O30fR-EE',
                        'type' => 'video'
                    ],
                    [
                        'name' => 'Codecademy Introduction to HTML',
                        'url' => 'https://www.codecademy.com/learn/learn-html',
                        'type' => 'article'
                    ],
                ],
            ],
            [
                'name' => 'CSS',
                'links' => [
                    [
                        'name' => 'CSS Reference',
                        'url' => 'https://cssreference.io/',
                        'type' => 'article'
                    ],
                    [
                        'name' => 'TraversyMedia CSS Crash Course',
                        'url' => 'https://www.youtube.com/watch?v=yfoY53QXEnI',
                        'type' => 'video'
                    ],
                    [
                        'name' => 'Codecademy Learn CSS',
                        'url' => 'https://www.codecademy.com/learn/learn-css',
                        'type' => 'article'
                    ],
                    [
                        'name' => 'Flexbox Zombies Master Course',
                        'url' => 'https://mastery.games/p/flexbox-zombies',
                        'type' => 'game'
                    ],
                ],
            ],
            [
                'name' => 'Basic Terminal Commands',
                'links' => [
                    [
                        'name' => 'Treehouse Article',
                        'url' => 'https://blog.teamtreehouse.com/introduction-to-the-mac-os-x-command-line',
                        'type' => 'article'
                    ],
                    [
                        'name' => 'Codecademy Course',
                        'url' => 'https://www.codecademy.com/courses/learn-the-command-line/lessons/navigation/exercises/your-first-command?action=resume_content_item',
                        'type' => 'article'
                    ],
                ],
            ],
            [
                'name' => 'Git',
                'links' => [
                    [
                        'name' => 'Git Tower eBook',
                        'url' => 'https://www.git-tower.com/learn/',
                        'type' => 'book'
                    ],
                    [
                        'name' => 'Git Tower Video Course',
                        'url' => 'https://www.git-tower.com/learn/',
                        'type' => 'video'
                    ],
                    [
                        'name' => 'Git - The simple guide',
                        'url' => 'https://rogerdudler.github.io/git-guide/',
                        'type' => 'article'
                    ],
                    [
                        'name' => 'Branch from Master, and Make Your First Commit Article',
                        'url' => 'https://dev.to/taeluralexis/break-git-down-how-to-create-a-branch-from-master-and-make-your-first-commit-2960',
                        'type' => 'article'
                    ],
                ],
            ],
            [
                'name' => 'Local PHP Environment',
                'children' => [
                    [
                        'name' => 'Valet (if using a Mac)',
                        'links' => [
                            [
                                'name' => 'Laravel Docs (Valet)',
                                'url' => 'https://laravel.com/docs/valet',
                                'type' => 'article'
                            ],
                            [
                                'name' => 'Laracasts Video',
                                'url' => 'https://laracasts.com/series/setup-a-mac-dev-machine-from-scratch/episodes/10',
                                'type' => 'video'
                            ],
                        ],
                    ],
                    [
                        'name' => 'Valet Linux (if using Linux)',
                        'links' => [
                            [
                                'name' => 'Valet Linux',
                                'url' => 'https://cpriego.github.io/valet-linux/',
                                'type' => 'article'
                            ],
                        ],
                    ],
                    [
                        'name' => 'Laragon (standalone installable for Windows)',
                        'links' => [
                            [
                                'name' => 'Laragon',
                                'url' => 'https://laragon.org/',
                                'type' => 'article'
                            ],
                        ],
                    ],
                    [
                        'name' => 'Homestead (if you prefer Vagrant)',
                        'links' => [
                            [
                                'name' => 'Laravel Docs',
                                'url' => 'https://laravel.com/docs/homestead',
                                'type' => 'article'
                            ],
                        ],
                    ],
                    [
                        'name' => 'Vessel (if you prefer Docker)',
                        'links' => [
                            [
                                'name' => 'Vessel Docs',
                                'url' => 'https://vessel.shippingdocker.com/',
                                'type' => 'article'
                            ],
                        ],
                    ],
                    [
                        'name' => 'Composer',
                        'links' => [
                            [
                                'name' => 'Laracasts Video',
                                'url' => 'https://laracasts.com/series/setup-a-mac-dev-machine-from-scratch/episodes/6',
                                'type' => 'video'
                            ],
                            [
                                'name' => 'Step by Step tutorial (Ubuntu)',
                                'url' => 'https://www.digitalocean.com/community/tutorials/how-to-install-and-use-composer-on-ubuntu-18-04',
                                'type' => 'article'
                            ]
                        ],
                    ],
                ],
            ],
            [
                'name' => 'Beginning PHP',
                'children' => [
                    [
                        'name' => 'Variables',
                        'links' => [
                            [
                                'name' => 'Laracasts Video',
                                'url' => 'https://laracasts.com/series/php-for-beginners/episodes/3',
                                'type' => 'article'
                            ],
                            [
                                'name' => 'Codecademy',
                                'url' => 'https://www.codecademy.com/learn/learn-php/modules/learn-php-variables',
                                'type' => 'article'
                            ],
                        ],
                    ],
                    [
                        'name' => 'Arrays',
                        'links' => [
                            [
                                'name' => 'Laracasts Video',
                                'url' => 'https://laracasts.com/series/php-for-beginners/episodes/6',
                                'type' => 'video'
                            ],
                            [
                                'name' => 'Codecademy',
                                'url' => 'https://www.codecademy.com/learn/learn-php/modules/learn-php-arrays',
                                'type' => 'article'
                            ],
                        ],
                    ],
                    [
                        'name' => 'Functions',
                        'links' => [
                            [
                                'name' => 'Laracasts Video',
                                'url' => 'https://laracasts.com/series/php-for-beginners/episodes/10',
                                'type' => 'video'
                            ],
                            [
                                'name' => 'Codecademy',
                                'url' => 'https://www.codecademy.com/learn/learn-php/modules/introduction-to-functions-in-php',
                                'type' => 'article'
                            ],
                        ],
                    ],
                    [
                        'name' => 'Classes',
                        'links' => [
                            [
                                'name' => 'Laracasts Video',
                                'url' => 'https://laracasts.com/series/php-for-beginners/episodes/12',
                                'type' => 'video'
                            ],
                        ],
                    ],
                    [
                        'name' => 'Conditionals',
                        'links' => [
                            [
                                'name' => 'Codecademy',
                                'url' => 'https://www.codecademy.com/learn/learn-php/modules/conditionals-logic-php',
                                'type' => 'article'
                            ],
                        ],
                    ],
                    [
                        'name' => 'Loops',
                        'links' => [
                            [
                                'name' => 'Codecademy',
                                'url' => 'https://www.codecademy.com/learn/learn-php/modules/php-loops',
                                'type' => 'article'
                            ],
                        ],
                    ],
                    [
                        'name' => 'Constructors',
                    ],
                    [
                        'name' => 'Basic Inheritance',
                    ],
                ],
            ],
            [
                'name' => 'Object-Oriented Programming',
                'links' => [
                    [
                        'name' => 'Laracasts Video',
                        'url' => 'https://laracasts.com/series/object-oriented-bootcamp-in-php',
                        'type' => 'video'
                    ],
                ],
            ],
            [
                'name' => 'Creating and serving a new Laravel project',
                'links' => [
                    [
                        'name' => 'Laravel docs',
                        'url' => 'https://laravel.com/docs/installation',
                        'type' => 'article'
                    ],
                    [
                        'name' => 'Laracasts Video',
                        'url' => 'https://laracasts.com/series/laravel-from-scratch-2018/episodes/2',
                        'type' => 'video'
                    ],
                ],
            ],
            [
                'name' => 'Laravel Basics',
                'links' => [
                    [
                        'name' => 'Laracasts Series',
                        'url' => 'https://laracasts.com/series/laravel-from-scratch-2018',
                        'type' => 'video'
                    ],
                ],
                'children' => [
                    [
                        'name' => 'Laravel Routing &amp; HTTP Verbs (using route closures)',
                        'links' => [
                            [
                                'name' => 'Laravel Docs (Routing)',
                                'url' => 'https://laravel.com/docs/routing',
                                'type' => 'article'
                            ],
                            [
                                'name' => 'Laracasts Video',
                                'url' => 'https://laracasts.com/series/laravel-from-scratch-2018/episodes/3',
                                'type' => 'video'
                            ],
                        ],
                    ],
                    [
                        'name' => 'Blade Syntax &amp; Inheritance',
                        'links' => [
                            [
                                'name' => 'Laravel Docs (Blade)',
                                'url' => 'https://laravel.com/docs/blade',
                                'type' => 'article'
                            ],
                            [
                                'name' => 'Laracasts Laravel From Scratch #4',
                                'url' => 'https://laracasts.com/series/laravel-from-scratch-2018/episodes/4',
                                'type' => 'video'
                            ],
                            [
                                'name' => 'Laracasts Laravel From Scratch #5',
                                'url' => 'https://laracasts.com/series/laravel-from-scratch-2018/episodes/5',
                                'type' => 'video'
                            ],
                        ],
                    ],
                    [
                        'name' => 'Relational Databases',
                        'links' => [
                            [
                                'name' => 'Servers for Hackers Video',
                                'url' => 'https://serversforhackers.com/s/up-and-running-with-mysql',
                                'type' => 'video'
                                ],
                            [
                                'name' => 'Khan Academy Article',
                                'url' => 'https://www.khanacademy.org/computing/computer-programming/sql',
                                'type' => 'article'
                            ],
                            [
                                'name' => 'W3 Schools Exercise',
                                'url' => 'https://www.w3schools.com/sql/exercise.asp?filename=exercise_select1',
                                'type' => 'article'
                            ],
                            [
                                'name' => 'Laracasts Video',
                                'url' => 'https://laracasts.com/series/php-for-beginners/episodes/11',
                                'type' => 'video'
                            ],
                        ],
                    ],
                    [
                        'name' => 'Basic migrations',
                        'links' => [
                            [
                                'name' => 'Laravel Docs (Migrations)',
                                'url' => 'https://laravel.com/docs/5.8/migrations',
                                'type' => 'article'
                            ],
                            [
                                'name' => 'Laracasts Video',
                                'url' => 'https://laracasts.com/series/laravel-from-scratch-2018/episodes/7',
                                'type' => 'video'
                            ],
                        ],
                    ],
                    [
                        'name' => 'Basic Eloquent syntax',
                        'links' => [
                            [
                                'name' => 'Laravel Docs (Eloquent)',
                                'url' => 'https://laravel.com/docs/5.8/eloquent',
                                'type' => 'article'
                            ],
                            [
                                'name' => 'Laracasts Video',
                                'url' => 'https://laracasts.com/series/laravel-from-scratch-2018/episodes/8',
                                'type' => 'video'
                            ],
                        ],
                    ],
                    [
                        'name' => 'CSRF',
                        'links' => [
                            [
                                'name' => 'Laravel Docs (CSRF)',
                                'url' => 'https://laravel.com/docs/5.8/csrf',
                                'type' => 'article'
                            ],
                            [
                                'name' => 'Laracasts Video',
                                'url' => 'https://laracasts.com/series/laravel-from-scratch-2018/episodes/10',
                                'type' => 'video'
                            ],
                        ],
                    ],
                    [
                        'name' => 'Validation',
                        'links' => [
                            [
                                'name' => 'Laravel Docs (Validation)',
                                'url' => 'https://laravel.com/docs/5.8/validation',
                                'type' => 'article'
                            ],
                        ],
                    ],
                    [
                        'name' => 'Sending mail',
                        'links' => [
                            [
                                'name' => 'Laravel Docs (Mail)',
                                'url' => 'https://laravel.com/docs/5.8/mail',
                                'type' => 'article'
                            ],
                            [
                                'name' => 'Laravel Docs (Notifications)',
                                'url' => 'https://laravel.com/docs/5.8/notifications',
                                'type' => 'article'
                            ],
                        ],
                    ],
                    [
                        'name' => 'Service Container',
                        'links' => [
                            [
                                'name' => 'Laravel Docs (Container)',
                                'url' => 'https://laravel.com/docs/5.8/container',
                                'type' => 'article'
                            ],
                        ],
                    ],
                ],
            ],
            [
                'name' => 'Basic JavaScript',
                'links' => [
                    [
                        'name' => 'Wes Bos Video Series',
                        'url' => 'https://javascript30.com/',
                        'type' => 'video'
                    ],
                    [
                        'name' => 'TraversyMedia JavaScript Crash Course',
                        'url' => 'https://www.youtube.com/watch?v=hdI2bqOjy3c',
                        'type' => 'video'
                    ],
                    [
                        'name' => 'Codecademy',
                        'url' => 'https://www.codecademy.com/learn/learn-javascript',
                        'type' => 'article'
                    ],
                ],
            ],
            [
                'name' => 'Laravel Mix',
                'links' => [
                    [
                        'name' => 'Laracasts Series',
                        'url' => 'https://laracasts.com/series/learn-laravel-mix',
                        'type' => 'video'
                    ],
                ],
            ],
            [
                'name' => 'Basic session-backed internal APIs',
            ],
            [
                'name' => 'Deployments',
            ],
            [
                'name' => 'Monitoring (e.g. Bugsnag)',
            ],
            [
                'name' => 'Basic Testing',
                'links' => [
                    [
                        'name' => 'Start Testing Laravel',
                        'url' => 'https://jasonmccreary.me/articles/start-testing-laravel/',
                        'type' => 'article'
                    ],
                ],
            ]
        ];

        $es = [
            [
                'name' => 'HTML',
                'links' => [
                    [
                        'name' => 'Refencia de Elementos HTML',
                        'url' => 'https://developer.mozilla.org/es/docs/Web/HTML/Elemento/',
                        'type' => 'article'
                    ],
                    [
                        'name' => 'Curso HTML para principiantes de Fazt',
                        'url' => 'https://www.youtube.com/watch?v=rbuYtrNUxg4',
                        'type' => 'video'
                    ],
                    [
                        'name' => 'Curso HTML desde cero de EDteam',
                        'url' => 'https://ed.team/cursos/html',
                        'type' => 'course'
                    ],
                ],
            ],
            [
                'name' => 'CSS',
                'links' => [
                    [
                        'name' => 'Referencia CSS',
                        'url' => 'https://developer.mozilla.org/es/docs/Web/CSS/Referencia_CSS',
                        'type' => 'article'
                    ],
                    [
                        'name' => 'Curso CSS para principiantes de Fazt',
                        'url' => 'https://www.youtube.com/watch?v=W6GTDfrWjXs',
                        'type' => 'video'
                    ],
                    [
                        'name' => 'Curso CSS desde cero de EDteam',
                        'url' => 'https://ed.team/cursos/css',
                        'type' => 'course'
                    ],
                ],
            ],
            [
                'name' => 'Comandos de terminal básicos',
                'links' => [
                    [
                        'name' => 'Video de códigofacilito',
                        'url' => 'https://www.youtube.com/watch?v=FP_4uQXysRU',
                        'type' => 'video'
                    ],
                    [
                        'name' => 'Git - La guía simple',
                        'url' => 'https://rogerdudler.github.io/git-guide/index.es.html',
                        'type' => 'article'
                    ],
                ],
            ],
            [
                'name' => 'Git',
                'links' => [
                    [
                        'name' => 'Curso Git de códigofacilito',
                        'url' => 'https://www.youtube.com/watch?v=zH3I1DZNovk&list=PL9xYXqvLX2kMUrXTvDY6GI2hgacfy0rId',
                        'type' => 'article'
                    ],
                ],
            ],
            [
                'name' => 'Ambiente local de PHP',
                'children' => [
                    [
                        'name' => 'Valet',
                        'links' => [
                            [
                                'name' => 'Documentación de Laravel',
                                'url' => 'https://docs.laraveles.com/docs/5.5/valet',
                                'type' => 'article'
                            ],
                        ],
                    ],
                    [
                        'name' => 'Composer',
                        'links' => [
                            [
                                'name' => 'Artículo de Styde',
                                'url' => 'https://styde.net/instalacion-de-composer-y-laravel-en-windows/',
                                'type' => 'article'
                            ]
                        ],
                    ],
                ],
            ],
            [
                'name' => 'Comenzando con PHP',
                'children' => [
                    [
                        'name' => 'Variables',
                        'links' => [
                            [
                                'name' => 'Manual PHP',
                                'url' => 'https://www.php.net/manual/es/language.variables.php',
                                'type' => 'article'
                            ]
                        ],
                    ],
                    [
                        'name' => 'Arreglos',
                        'links' => [
                            [
                                'name' => 'Manual PHP',
                                'url' => 'https://www.php.net/manual/es/language.types.array.php',
                                'type' => 'article'
                            ]
                        ],
                    ],
                    [
                        'name' => 'Funciones',
                        'links' => [
                            [
                                'name' => 'Manual PHP',
                                'url' => 'https://www.php.net/manual/es/language.functions.php',
                                'type' => 'article'
                            ]
                        ],
                    ],
                    [
                        'name' => 'Clases',
                        'links' => [
                            [
                                'name' => 'Manual PHP',
                                'url' => 'https://www.php.net/manual/es/language.oop5.basic.php',
                                'type' => 'article'
                            ],
                            [
                                'name' => 'Video de Styde',
                                'url' => 'https://styde.net/por-que-necesitamos-clases-y-objetos-php/',
                                'type' => 'article'
                            ]
                        ],
                    ],
                   [
                        'name' => 'Constructores',
                        'links' => [
                            [
                                'name' => 'Video de Styde',
                                'url' => 'https://styde.net/encapsulamiento-y-uso-de-getters-y-setters-en-php/',
                                'type' => 'article'
                            ]
                        ],
                    ],
                    [
                        'name' => 'Herencia Básica',
                        'links' => [
                            [
                                'name' => 'Video de Styde',
                                'url' => 'https://styde.net/herencia-y-abstraccion-con-php/',
                                'type' => 'article'
                            ]
                        ],
                    ],
                ],
            ],
            [
                'name' => 'Programación orientada a objetos',
            ],
            [
                'name' => 'Creando y ejecutando un nuevo proyecto de Laravel',
                'links' => [
                    [
                        'name' => 'Documentación de Laravel',
                        'url' => 'https://docs.laraveles.com/docs/5.5/installation',
                        'type' => 'article'
                    ],
                    [
                        'name' => 'Video de Styde',
                        'url' => 'https://styde.net/instalacion-de-composer-y-laravel/',
                        'type' => 'article'
                    ]
                ],
            ],
            [
                'name' => 'Conceptos básicos de Laravel',
                'links' => [
                    [
                        'name' => 'Curso de Laravel desde cero de Styde',
                        'url' => 'https://styde.net/laravel-5/',
                        'type' => 'article'
                    ]
                ],
                'children' => [
                    [
                        'name' => 'Enrutamiento con Laravel &amp; verbos de HTTP (usando funciones anónimas)',
                        'links' => [
                            [
                                'name' => 'Laravel Docs',
                                'url' => 'https://docs.laraveles.com/docs/5.5/routing',
                                'type' => 'article'
                            ],
                            [
                                'name' => 'Video de Styde',
                                'url' => 'https://styde.net/rutas-con-laravel/',
                                'type' => 'article'
                            ]
                        ],
                    ],
                    [
                        'name' => 'Sintaxis de Blade &amp; Herencia',
                        'links' => [
                            [
                                'name' => 'Laravel Docs',
                                'url' => 'https://docs.laraveles.com/docs/5.5/blade',
                                'type' => 'article'
                            ],
                            [
                                'name' => 'Video de Styde',
                                'url' => 'https://styde.net/blade-el-sistema-de-plantillas-de-laravel/',
                                'type' => 'article'
                            ],
                            [
                                'name' => 'Video de Styde',
                                'url' => 'https://styde.net/layouts-con-blade/',
                                'type' => 'article'
                            ]
                        ],
                    ],
                    [
                        'name' => 'Bases de datos relacionadas',
                        'links' => [
                            [
                                'name' => 'Khan Academy Article',
                                'url' => 'https://es.khanacademy.org/computing/computer-programming/sql',
                                'type' => 'article'
                            ]
                        ],
                    ],
                    [
                        'name' => 'Migraciones',
                        'links' => [
                            [
                                'name' => 'Laravel Docs',
                                'url' => 'https://docs.laraveles.com/docs/5.5/migrations',
                                'type' => 'article'
                            ],
                            [
                                'name' => 'Video de Styde',
                                'url' => 'https://styde.net/introduccion-a-las-bases-de-datos-y-migraciones-con-laravel/',
                                'type' => 'article'
                            ]
                        ],
                    ],
                    [
                        'name' => 'Sintaxis básica de Eloquent',
                        'links' => [
                            [
                                'name' => 'Laravel Docs',
                                'url' => 'https://docs.laraveles.com/docs/5.5/eloquent',
                                'type' => 'article'
                            ],
                            [
                                'name' => 'Video de Styde',
                                'url' => 'https://styde.net/introduccion-a-eloquent-el-orm-del-framework-laravel/',
                                'type' => 'article'
                            ]
                        ],
                    ],
                    [
                        'name' => 'CSRF',
                        'links' => [
                            [
                                'name' => 'Laravel Docs',
                                'url' => 'https://docs.laraveles.com/docs/5.5/csrf',
                                'type' => 'article'
                            ],
                            [
                                'name' => 'Video de Styde',
                                'url' => 'https://styde.net/rutas-con-post-y-proteccion-contra-ataques-de-tipo-csrf-en-laravel/',
                                'type' => 'article'
                            ]
                        ],
                    ],
                    [
                        'name' => 'Validación',
                        'links' => [
                            [
                                'name' => 'Laravel Docs',
                                'url' => 'https://docs.laraveles.com/docs/5.5/validation',
                                'type' => 'article'
                            ]
                        ],
                    ],
                    [
                        'name' => 'Envío de correos electrónicos',
                        'links' => [
                            [
                                'name' => 'Laravel Docs',
                                'url' => 'https://docs.laraveles.com/docs/5.5/mail',
                                'type' => 'article'
                            ],
                            [
                                'name' => 'Laravel Docs',
                                'url' => 'https://docs.laraveles.com/docs/5.5/notifications',
                                'type' => 'article'
                            ]
                        ],
                    ],
                    [
                        'name' => 'Service Container',
                        'links' => [
                            [
                                'name' => 'Laravel Docs',
                                'url' => 'https://docs.laraveles.com/docs/5.5/container',
                                'type' => 'article'
                            ]
                        ],
                    ],
                ],
            ],
            [
                'name' => 'JavaScript Básico',
                'links' => [
                    [
                        'name' => 'Javascript desde cero de EDteam',
                        'url' => 'https://ed.team/cursos/javascript',
                        'type' => 'article'
                    ]
                ],
            ],
            [
                'name' => 'Laravel Mix',
            ],
            [
                'name' => 'Conceptos básicos de APIs internas',
            ],
            [
                'name' => 'Despliegues',
            ],
            [
                'name' => 'Monitoreo (e.g. Bugsnag)',
            ],
        ];

        collect($en)->each(function ($entry) {

            if (array_key_exists('children', $entry)) {
                collect($entry['children'])->each(function ($child) {
                    $module = Module::create([
                    'name' => $child['name'],
                    'slug' => Str::slug($child['name']),
                ]);

                if (array_key_exists('links', $child) && count($child['links'])) {
                    collect($child['links'])->each(function ($resource) use ($module) {
                        $module->resources()->create([
                            'name' => $resource['name'],
                            'url' => $resource['url'],
                            'type' => $resource['type'],
                            'is_free' => true
                        ]);
                    });
                }

                });
            }

            if (array_key_exists('links', $entry)) {

                $module = Module::create([
                    'name' => $entry['name'],
                    'slug' => Str::slug($entry['name']),
                ]);

                if (array_key_exists('links', $entry) && count($entry['links'])) {
                    collect($entry['links'])->each(function ($resource) use ($module) {
                        $module->resources()->create([
                            'name' => $resource['name'],
                            'url' => $resource['url'],
                            'type' => $resource['type'],
                            'is_free' => true
                        ]);
                    });
                }
            }
        });

        collect($es)->each(function ($entry) {

            if (array_key_exists('children', $entry)) {
                collect($entry['children'])->each(function ($child) {
                    $module = Module::create([
                    'name' => $child['name'],
                    'slug' => 'es_' . Str::slug($child['name']),
                ]);

                if (array_key_exists('links', $child) && count($child['links'])) {
                    collect($child['links'])->each(function ($resource) use ($module) {
                        $module->resources()->create([
                            'name' => $resource['name'],
                            'url' => $resource['url'],
                            'type' => $resource['type'],
                            'is_free' => true
                        ]);
                    });
                }

                });
            }

            if (array_key_exists('links', $entry)) {

                $module = Module::create([
                    'name' => $entry['name'],
                    'slug' => 'es_' . Str::slug($entry['name']),
                ]);

                if (array_key_exists('links', $entry) && count($entry['links'])) {
                    collect($entry['links'])->each(function ($resource) use ($module) {
                        $module->resources()->create([
                            'name' => $resource['name'],
                            'url' => $resource['url'],
                            'type' => $resource['type'],
                            'is_free' => true
                        ]);
                    });
                }
            }
        });
    }
}
