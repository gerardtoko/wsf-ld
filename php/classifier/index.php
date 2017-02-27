<?php

include('vendor/autoload.php'); // won't include it again in the following examples

use NlpTools\Tokenizers\WhitespaceTokenizer;
use NlpTools\Models\FeatureBasedNB;
use NlpTools\Documents\TrainingSet;
use NlpTools\Documents\TokensDocument;
use NlpTools\FeatureFactories\DataAsFeatures;
use NlpTools\Classifiers\MultinomialNBClassifier;

$tset = new TrainingSet(); // will hold the training documents
$tok = new WhitespaceTokenizer(); // will split into tokens
$ff = new DataAsFeatures(); // see features in documentation

// ---------- Training ----------------
// ---------- Data ----------------
// data is taken from http://archive.ics.uci.edu/ml/datasets/SMS+Spam+Collection
// we use a part for training
$training = array(
    array('ham','Go until jurong point, crazy.. Available only in bugis n great world la e buffet... Cine there got amore wat...'),
    array('ham','Fine if that\'s the way u feel. That\'s the way its gota b'),
    array('spam','England v Macedonia - dont miss the goals/team news. Txt ur national team to 87077 eg ENGLAND to 87077 Try:WALES, SCOTLAND 4txt/ú1.20 POBOXox36504W45WQ 16+')
);

foreach ($training as $d)
{
    $tset->addDocument(
        $d[0], // class
        new TokensDocument(
            $tok->tokenize($d[1]) // The actual document
        )
    );
}

$model = new FeatureBasedNB(); // train a Naive Bayes model
$model->train($ff,$tset);
