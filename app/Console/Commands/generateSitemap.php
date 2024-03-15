<?php

namespace App\Console\Commands;

use App\Models\News;
use App\Models\Theme;
use App\Models\Topic;
use DateTime;
use Illuminate\Console\Command;

class generateSitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:generate-sitemap';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //дефолтная дата, к примеру создания сайта. Используется там,
        //где нужно указать дату для страниц не сохраненных в базе данных
        $defaultdate = new DateTime('2018-01-01 10:01:01');
        //берем базовый урл сайта
        $site_url = env('APP_URL');
        //это шаблон файла XML для сайтмапа, здесь не нужно ничего менять
        $base = '<?xml version="1.0" encoding="UTF-8"?>
            <urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
            </urlset>';
        //создаем корневой элемент, в который будут добавлены все остальные
        $xmlbase = new \SimpleXMLElement($base);
        //создаем первый элемент, с ссылкой на главную страницу
        $row  = $xmlbase->addChild("url");
        $row->addChild("loc", $site_url);
        //параметр lastmod - последнее обновление вашей страницы.
        //дата последней модификации задана временем генерации файла
        //учитывайте формат времени здесь должен быть конкретный Y-m-d\TH:i:sP , в противном случае
        //получите ошибку валидности файла
        $row->addChild("lastmod", date("c"));
        //Так как она статична, задал ей частоту - раз в месяц
        $row->addChild("changefreq","monthly");
        //можете варьировать приоритетность страниц вашего сайта этим параметром
        $row->addChild("priority","1");

        $row  = $xmlbase->addChild("url");
        $row->addChild("loc",route('index.news'));
        //здесь и используем дефолтную дату из самого начала функции
        $row->addChild("lastmod",$defaultdate->format("Y-m-d\TH:i:sP"));
        $row->addChild("changefreq","monthly");
        // приоритет
        $row->addChild("priority","1");

        //допустим у нас есть блог, берем с него только опубликованные посты
        foreach (News::where("is_published", 1)->get() as $item) {
            $row  = $xmlbase->addChild("url");
            //здесь передаем ссылку на страницу записи блога, предполагается что
            //ваш роутинг имеет именованное правило blog_show с параметром slug
            $row->addChild("loc",route('show.news', ['news'=> $item->id]));
            //здесь для простоты обновления взята дата создания - created_at, вы же можете
            //использовать updated_at, но он меняется по каждому чиху,
            //например при увеличении счетчика просмотра страницы
            $date = new DateTime($item->created_at);
            //передаем дату в правильном формате
            $row->addChild("lastmod",$date->format("Y-m-d\TH:i:sP"));
            //уже созданные страницы блога редко кто меняет часто,
            //нет смысла задергивать поисковик и тратить ресурсы сайта/хостинга/сервера за зря
            $row->addChild("changefreq","monthly");
            $row->addChild("priority","2");
        }

        //допустим у нас есть блог, берем с него только опубликованные посты
        foreach (Theme::where("is_published", 1)->get() as $item) {
            $row  = $xmlbase->addChild("url");
            //здесь передаем ссылку на страницу записи блога, предполагается что
            //ваш роутинг имеет именованное правило blog_show с параметром slug
            $row->addChild("loc",route('show.theme', ['theme'=> $item->id]));
            //здесь для простоты обновления взята дата создания - created_at, вы же можете
            //использовать updated_at, но он меняется по каждому чиху,
            //например при увеличении счетчика просмотра страницы
            $date = new DateTime($item->created_at);
            //передаем дату в правильном формате
            $row->addChild("lastmod",$date->format("Y-m-d\TH:i:sP"));
            //уже созданные страницы блога редко кто меняет часто,
            //нет смысла задергивать поисковик и тратить ресурсы сайта/хостинга/сервера за зря
            $row->addChild("changefreq","monthly");
            $row->addChild("priority","2");
        }

        //допустим у нас есть блог, берем с него только опубликованные посты
        foreach (Topic::where("is_published", 1)->get() as $item) {
            $row  = $xmlbase->addChild("url");
            //здесь передаем ссылку на страницу записи блога, предполагается что
            //ваш роутинг имеет именованное правило blog_show с параметром slug
            $row->addChild("loc",route('show.topic', ['topic'=> $item->id]));
            //здесь для простоты обновления взята дата создания - created_at, вы же можете
            //использовать updated_at, но он меняется по каждому чиху,
            //например при увеличении счетчика просмотра страницы
            $date = new DateTime($item->created_at);
            //передаем дату в правильном формате
            $row->addChild("lastmod",$date->format("Y-m-d\TH:i:sP"));
            //уже созданные страницы блога редко кто меняет часто,
            //нет смысла задергивать поисковик и тратить ресурсы сайта/хостинга/сервера за зря
            $row->addChild("changefreq","monthly");
            $row->addChild("priority","3");
        }


        //после того как создали карту сайта, ее нужно записать в файл
        $xmlbase->saveXML(public_path()."/sitemap.xml");
    }
}

//php artisan generate:sitemap
//app:generate-sitemap
//app\Console\Kernel.php
/*protected $commands = [
        //...
        generateSitemap::class,
    ];*/

/*protected function schedule(Schedule $schedule)
    {
//...
//->daily() отвечает за вызов команды раз в день
        $schedule->command('generate:sitemap')->daily();
//...
}*/
