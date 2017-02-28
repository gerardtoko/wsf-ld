# coding: utf-8

"""
Suppose you have some texts of news and know their categories.
You want to train a system with this pre-categorized/pre-classified
texts. So, you have better call this data your training set.
"""

# You need to train the system passing each text one by one to the trainer module.
newsSet = [
    {'text': 'Oui bonjour je vous écoute', 'category': 'hello'},
    {'text': 'Salut la team', 'category': 'hello'},
    {'text': 'Hello', 'category': 'hello'},
    {'text': 'J‘ai besoin de savoir une informaton ou une question', 'category': 'question'},
    {'text': 'J‘ai une question', 'category': 'question'},
    {'text': 'Aurevoir', 'category': 'tiao'},
    {'text': 'Merci, bonne journée !', 'category': 'tiao'},
    {'text': 'Top merci pour votre aide', 'category': 'tiao'},
]
