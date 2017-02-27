# coding: utf-8

"""
Suppose you have some texts of news and know their categories.
You want to train a system with this pre-categorized/pre-classified
texts. So, you have better call this data your training set.
"""
from naiveBayesClassifier import tokenizer
from naiveBayesClassifier.trainer import Trainer
from naiveBayesClassifier.classifier import Classifier

newsTrainer = Trainer(tokenizer)

# You need to train the system passing each text one by one to the trainer module.
newsSet = [
    {'text': 'Oui bonjour je vous écoute', 'category': 'hello'},
    {'text': 'Salut la team', 'category': 'hello'},
    {'text': 'Hello', 'category': 'hello'},
    {'text': 'J‘ai besoin de savoir une informaton ou une question', 'category': 'question'},
    {'text': 'J‘ai une question', 'category': 'question'},
]

for news in newsSet:
    newsTrainer.train(news['text'], news['category'])

# When you have sufficient trained data, you are almost done and can start to use
# a classifier.
newsClassifier = Classifier(newsTrainer.data, tokenizer)

categories = ['hello', 'question']

def ma_loop(cat, value):
    if cat == 'hello':
        hello(value)
    if cat == 'question':
        question(value)

def question(value=None):
    var = raw_input("Sur sur quoi ?")
    classification = newsClassifier.classify(var)
    class_ = classification[0][0]
    return ma_loop(class_, var)

def hello(value=None):
    var = raw_input("Bonjour, Quelle est votre question ?")
    # Now you have a classifier which can give a try to classifiy text of news whose
    # category is unknown, yet.
    classification = newsClassifier.classify(var)
    class_ = classification[0][0]
    return ma_loop(class_, var)

var = raw_input("Bonjour, je peux vous aider ? ")
hello()
