<?php

include('vendor/autoload.php'); // won't include it again in the following examples
include('classifier/index.php');

use NlpTools\Tokenizers\WhitespaceTokenizer;
use NlpTools\Models\FeatureBasedNB;
use NlpTools\Documents\TrainingSet;
use NlpTools\Documents\TokensDocument;
use NlpTools\FeatureFactories\DataAsFeatures;
use NlpTools\Classifiers\MultinomialNBClassifier;


// ---------- Classification ----------------
// ---------- Data ----------------
// For evaluating
$testing = array(
    array('ham','I\'ve been searching for the right words to thank you for this breather. I promise i wont take your help for granted and will fulfil my promise. You have been wonderful and a blessing at all times.'),
    array('ham','I HAVE A DATE ON SUNDAY WITH WILL!!'),
    array('spam','XXXMobileMovieClub: To use your credit, click the WAP link in the next txt message or click here>> http://wap. xxxmobilemovieclub.com?n=QJKGIGHJJGCBL')
);

$cls = new MultinomialNBClassifier($ff, $model);
$correct = 0;
foreach ($testing as $d)
{
    // predict if it is spam or ham
    $prediction = $cls->classify(
        array('ham','spam'), // all possible classes
        new TokensDocument(
            $tok->tokenize($d[1]) // The document
        )
    );
    printf($prediction);
}

?>
