<?php
namespace app\forms;

use windows;
use std, gui, framework, app;

class MainForm extends AbstractForm
{

    /**
     * @event button.action 
     */
    function doButtonAction(UXEvent $e = null)
    {    
    
$number = rand(1,5);
if ($number == 1) {
    app()->form('popuhh')->label->text = "🚀 Support the project — leave a star ⭐";
}
if ($number == 2) {
    app()->form('popuhh')->label->text = "🌟 If you find it useful, star it and share with others! 🙌";
}
if ($number == 3) {
    app()->form('popuhh')->label->text = "💡 Open source is your freedom. Join the development! 🤝";
}
if ($number == 4) {
    app()->form('popuhh')->label->text = "🔔 Stay updated, contribute, and help us grow together! 🌱";
}
if ($number == 5) {
    app()->form('popuhh')->label->text = "❤ Like the project? Stars, forks, or kind words keep it going! 🙏";
}
    
    $screen = UXScreen::getPrimary()->bounds;
$width = preg_replace('/\D/', '', $screen['width']);
$height = preg_replace('/\D/', '', $screen['height']);

var_dump($width);
var_dump($height);

$formWidth = 425; 
$x = max($width - $formWidth - 1, 0);
$y = ($height / 1080) * 880;

app()->form('popuhh')->x = $x;
app()->form('popuhh')->y = $y;
$this->loadForm('popuhh');


    }

}
