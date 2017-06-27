<?php
/**
 *
 */
class Web
{

    private $app = '';

    public function __construct($app = 'Web')
    {
        # code...
        $this->app = $app;
    }

    public function test()
    {
        # code...
        return $this->app;
    }
}
$app = new Web;
echo $app->test();