<?php

/* EXERCISE 2
  Part 1 : 

  Design an HtmlString class.

It is intended to display bold and / or italic text.

  This class have only one property : $string

It will have the following methods:

- setString ($string)
Sets the string

- getString ()
Get the string

- getBoldString()
Get a bold version of the string

- getItalicString ()
Get an italic version of the string

- getItalicBoldString ()
Get a bold italic version of the string

Be careful, put the class declaration in a separate file!

  Use Example :
 */

require_once "./HtmlString.php";

$markup = new HtmlString('My strinnnng');
$markup->setString('My strinnnng');
$bold = $markup->getString();

echo $bold; /* Display <b>My strinnnng</b> */
/*
  Part 2 :

  Make it possible to directly create a HtmlString object and set the string using the constructor

 */

 $markup = new HtmlString('Hello world');
 echo $markup->getString() . "<br>";
 echo $markup->getBoldString() . "<br>";
 echo $markup->getItalicString() . "<br>";
 echo $markup->getItalicBoldString() . "<br>";
