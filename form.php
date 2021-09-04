<?php

/**
 * UML diyagramında yer alan Form sınıfını oluşturmanız beklenmekte.
 * 
 * Sınıf içerisinde static olmayan `fields`, `action` ve `method`
 * özellikleri (property) olması gerekiyor. OK
 * 
 * Sınıf içerisinde static olan ve Form nesnesi döndüren `createPostForm`,
 * `createGetForm` ve `createForm` methodları bulunmalı. Bu metodlar isminde de
 * belirtilen metodlarda Form nesneleri oluşturmalı. OK
 * 
 * Sınıf içerisinde bir "private" başlatıcı (constructor) bulunmalı. Bu başlatıcı
 * içerisinden `action` ve `method` değerleri alınıp ilgili property'lere değerleri
 * aktarılmalıdır.OK
 * 
 * Sınıf içerisinde static "olmayan" aşağıdaki metodlar bulunmalıdır.
 *   - `addField` metodu `fields` property dizisine değer eklemelidir.
 *   - `setMethod` metodu `method` propertysinin değerini değiştirmelidir.
 *   - `render` metodu form'un ilgili alanlarını HTML çıktı olarak verip bir buton çıktıya eklemelidir.
 * 
 * Sonuç ekran görüntüsüne `result.png` dosyasından veya `result.html` dosyasından ulaşabilirsiniz.
 * `app.php` çalıştırıldığında `result.html` ile aynı çıktıyı verecek şekilde geliştirme yapmalısınız.
 * 
 * > **Not: İsteyenler `app2.php` ve `form2.php` isminde dosyalar oluşturup sınıfa farklı özellikler kazandırabilir.
 */
class Form {

    //Ozellikler
    private string $action;
    private string $method;
    public array  $fields;

    //Metodlar
    private function __construct($action, $method){
        $this->action = $action;
        $this->method = $method;
    }

    public static function createPostForm($action){
    $myForm = new self($action, "POST");
    return $myForm;
    }

    public static function createGetForm($action){
    $myForm = new self($action, "GET");
    return $myForm;
    }

    public static function createForm($action, $method) {
        $myForm = new self($action, $method);
        return $myForm;
    }

    public function addField($field) {
    $this->fields[] = $field;
    }

    public function setMethod($method) {
    $this->method = $method;
    }

    public function render() {
        $formStart = "<form method='$this->method' action='$this->action'>";
    
        $formBody = "";
        
        foreach ($this->fields as $value){
          $formBody = $formBody .
          "<label for='$value'>$value</label>
        <input type='text' name='$value' value='' />";
        }
    
        $formEnd = "<button type='submit'>Gönder</button>
        </form>";

        echo "$formStart" . "$formBody" . "$formEnd";
    }
}



