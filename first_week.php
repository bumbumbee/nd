<?php

// Parašykite funkciją kurį atspausdintų jūsų vardą HTML dokumente kaip antraštę
function showName()
{
    echo "<h1>Simona</h1>";
}

showName();

//Parašykite funkciją, kuri turės 2 parametrus. Pirmas parametras tai tekstinė eilutė.  Paduodame į funkciją tekstinę eilutę (pirmas parametras) ir tikrinam antro parametro reikšmę, jeigu antro parametro reikšmė TRUE atspausdinti eilutę HTML dokumente kaip HTML antraštę (angl. heading), jei antro parametro reikšmė FALSE  – tiesiog atspausdinti eilutę.
//  NEAISKI FORMULUOTE Plius patikrinti ar yra paduodamas pirmas parametras (tekstinė eilutė). Jeigu parametras nėra paduodamas grąžinti (verta prisimint, kad grąžinti nelygu atspausdinti 🙂 ) loginę reikšmę FALSE.

function compare(string $a, $b)
{
    if ($a == null) {
        return false;
    } else {
        if ($b == true) {
            echo "<h1>$a</h1>";
        } else {
            echo "$a";
        };
    }
}

compare("Labai ilga tekstine eilute", true);

//turime 2 emocines būsenas – happy (laimingas) ir sad (liūdnas). Parašykite funkciją į kurią paduodant emocinę būseną (sad arba happy) ji grąžintų atitinkamą šypsenėlę vietoj būsenos, t.y. jeigu būsena sad, šypsenėlė – :-(, jeigu būsena  – happy, šypsenėlė – :-), jeigu būsena nėra atpažinta, šypsenėlė – :-|. Išveskite rezultatą panaudodami anksčiau sukurtas funkcijas tam, kad HTML dokumente išvesti tokią eilutę – <h1>Jūsų vardas</h1> is _Jūsų būsenos šypsenėlė_ today!

function getMood($mood)
{
    $name = showName();
    $smile = "";

    if ($mood == "happy") {
        $smile = ":)";
    } elseif ($mood == "sad") {
        $smile = ":(";
    } else {
        $smile = ":|";
    }

    echo "$name is $smile today!";
}

getMood("happy");


echo "<br>";
echo "<br>";


// masyvu nd
// Sukurti savo mėgstamiausių filmų/mėnesių/knygų/sporto šakų (pasirinkti vieną kategoriją arba porą jeigu norite) masyvą, prie kiekvienos reikšmės atspausdinti jos eilės numerį

$tvSeries = [
    "Penny Dreadful",
    "Wayward Pines",
    "Stranger Things",
    "Dark",
    "Game of Thrones"
];
$x = 1;
echo "My favourite TV series: <br>";
foreach ($tvSeries as $series) {
    echo $x . ". " . $series . "<br>";
    $x++;
}
echo "<br>";
// Išrinkite iš masyvo visus vaisius (angl. fruits) ir atspausdinkite jų pavadinimą, bei galutinę kainą (kaina = quantity*price). P.S. darome prielaidą, kad čia tiesiog kiekis ir nežiūrim ar čia kilogramai, ar gramai, ar tiesiog kiekis. Po apačia tą patį padarykite su daržovėmis (angl. vegetables).

$shopping_cart = [
    [
        'type' => 'vegetables',
        'name' => 'potato',
        'quantity' => '10',
        'price' => '1.0'
    ],
    [
        'type' => 'vegetables',
        'name' => 'onion',
        'quantity' => '5',
        'price' => '0.5'
    ],
    [
        'type' => 'vegetables',
        'name' => 'cucumber',
        'quantity' => '2',
        'price' => '1.2'
    ],
    [
        'type' => 'fruits',
        'name' => 'banana',
        'quantity' => '2',
        'price' => '1.0'
    ],
    [
        'type' => 'fruits',
        'name' => 'apple',
        'quantity' => '3',
        'price' => '1.2'
    ]
];


for ($x = 0; $x < count($shopping_cart); $x++) {
    $priceTotal = $shopping_cart[$x]['quantity'] * $shopping_cart[$x]['price'];

    if ($shopping_cart[$x]['type'] == "fruits") {
        echo "Name of the fruit is " . $shopping_cart[$x]['name'] . " and price for all items in stock is " . $priceTotal . "<br>";
    } elseif ($shopping_cart[$x]['type'] == "vegetables") {
        echo "Name of the vegetable is " . $shopping_cart[$x]['name'] . " and price for all items in stock is " . $priceTotal . "<br>";
    } else {
        echo "Unknown item";
    }
}
echo "<br>";
//  Parašyti funkciją į kurios argumentą perduodamas masyvas (nesvarbu koks masyvas – ar skaičiai, ar eilutės…). Funkciją grąžina paskutinį masyvo elementą jei jis nėra tuščias, jeigu masyvas tuščias atspausdina pranešimą – “Tuščias masyvas” arba “Array is empty”.

$simpleArray = [
    "Pirma eilute",
    "Antra eilute",
    "Trecia eilute",
    "Ketvirta eilute",
];

$emptyArr=[];

function showLast($array){
    if(empty($array)){
        echo "Given array is empty.";
    } else{
        echo "Last value in current array is ".end($array)."<br>";;
    }


}

showLast($simpleArray);
showLast($emptyArr);
