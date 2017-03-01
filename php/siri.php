<?php

include('vendor/autoload.php'); // won't include it again in the following examples
include_once('lib.php');
use NlpTools\Documents\TokensDocument;
use NlpTools\Classifiers\MultinomialNBClassifier;


// ---------- Classification ----------------
// ---------- Data ----------------
// For evaluating

function bonjour() {
  echo "Bonjour je peux vous aider ? ";
  $handle = fopen ("php://stdin","r");
  $line = fgets($handle);
  return $line;
}

$text = bonjour();
$cls = new MultinomialNBClassifier($ff, $model);
$what_category = $cls->classify(
    array('ham','spam'), // all possible classes
    new TokensDocument($tok->tokenize($text) // The document
    )
);

printf("$what_category\n");
?>
