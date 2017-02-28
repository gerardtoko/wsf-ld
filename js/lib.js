/*
Suppose you have some texts of news and know their categories.
You want to train a system with this pre-categorized/pre-classified
texts. So, you have better call this data your training set.
*/

var bayes = require('bayes');
var data = require('./data');

// Classifier
var classifier = bayes();
for (var i = 0; i < data.length; i++) {
  classifier.learn(data[i].text, data[i].category);
}

// teach it positive phrases

module.exports = classifier;
