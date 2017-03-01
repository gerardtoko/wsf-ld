<?php

include('vendor/autoload.php'); // won't include it again in the following examples

include('data.php');

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
