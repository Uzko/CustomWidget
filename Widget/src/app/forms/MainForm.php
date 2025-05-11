<?php
namespace app\forms;

use std, gui, framework, app;

class MainForm extends AbstractForm
{

    /**
     * @event button.action 
     */
    function doButtonAction(UXEvent $e = null)
    {    
    
    //Customization
    app()->form('popuhh')->title = "Widget"; //name form
    app()->form('popuhh')->rect->style = "-fx-fill: #ffffff;"; //background css
    app()->form('popuhh')->label->style = "-fx-text-fill: linear-gradient(to right, #0047cc, #005aff, #3898ff);"; //label css
    
    if (app()->form('MainForm')->edit->text == "What u want?" || app()->form('MainForm')->edit->text == "" || app()->form('MainForm')->edit == " "){
        $number = rand(1,5); //random number
    if ($number == 1) {
            app()->form('popuhh')->label->text = "🚀 Support the project — leave a star ⭐"; //1
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
            app()->form('popuhh')->label->text = "❤ Like the project? Stars, forks, or kind words keep it going! 🙏"; //5
        }
}else{
    app()->form('popuhh')->label->text = $this->edit->text;
}
    
    //customization end
    
    $sleep = true;
    
    $screen = UXScreen::getPrimary()->bounds; //Resolution
    $width = preg_replace('/\D/', '', $screen['width']);
    $height = preg_replace('/\D/', '', $screen['height']);

//var_dump($width);
//var_dump($height);

        $x = max($width - 425 - 1, 0);
        $y = min(($height / 1080) * 1000, $height - 210);

    $yhide = $y + 200;

app()->form('popuhh')->x = $x;
app()->form('popuhh')->y = $yhide; //For animation
Animation::fadeIn($this->form('popuhh'), 1);
app()->showForm('popuhh');
//app()->hideForm('MainForm');
Animation::moveTo($this->form('popuhh'), 1600, $x, $y); // Animation
if ($sleep == true){
    
    waitAsync(5000, function () use ($e, $event) {
    //app()->hideForm('popuhh');
    Animation::fadeOut($this->form('popuhh'), 1600);
        Animation::fadeOut($this->form('popuhh'), 1000, function () use ($e, $event) {
            app()->hideForm('popuhh');
                            });
                        });
                    }            


    }

    /**
     * @event edit.click 
     */
    function doEditClick(UXMouseEvent $e = null)
    {    
        $this->edit->text = "";
    }

}
