# coding: utf-8

"""
Suppose you have some texts of news and know their categories.
You want to train a system with this pre-categorized/pre-classified
texts. So, you have better call this data your training set.
"""
from lib import get_classer
from data import newsSet

excec = {
    'hello': 1,
    'tiao': 0,
    'question': 0
}

def ma_loop(value):
    newsClassifier = get_classer()
    classification = newsClassifier.classify(value)
    # [('tiao', 0.0), ('question', 0.0), ('hello', 0.0)]
    category = classification[0][0]
    score = classification[0][1]

    if score > 0:
        newsSet.append({'text': value, 'category': category})
        excec[category] += 1
        if category == 'hello': return hello()
        if category == 'question': return question()
        if category == 'tiao': return tiao()
    return pascompris(value)

def question():
    value = raw_input("A propos ?")
    return ma_loop(value)

def hello():
    if excec['hello'] is 1:
        value = raw_input("Bonjour, Quelle est votre question ?")
    elif excec['hello'] is 2:
        value = raw_input("Oui, bonjour, quelle est votre question, je peux vous aider ?")
    elif excec['hello'] is 3:
        value = raw_input("Oui, je vous écoute nous sommes à votre service ?")
    else:
        value = raw_input("Bonjour,")


    return ma_loop(value)

def pascompris():
    value = raw_input("Je n'ai pas compris, que voulez vous dire ?")
    return ma_loop(value)

def tiao():
    print "Aurevoir et merci de votre visite!"

hello()
