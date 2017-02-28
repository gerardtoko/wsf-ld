
var data = require('./data');
var siri = require('./lib');

var commander = function(text, callback) {
  process.stdout.write(text);
  process.stdin.setEncoding('utf8');
  process.stdin.once('data', ma_loop).resume();
}

// now ask it to categorize a document it has never seen before

excec = {
    'hello': 1,
    'tiao': 0,
    'question': 0
}

var ma_loop = function(value) {
  var category = siri.categorize(value);
  excec[category] += 1;
  if (category == 'hello') return hello();
  if (category == 'question') return question();
  if (category == 'tiao') return tiao();
  return pascompris();
}

var hello = function() {
  if (excec['hello'] == 1) {
    return commander("Bonjour, Quelle est votre question ?")
  }

  if (excec['hello'] == 2) {
    return commander("Oui, bonjour, quelle est votre question, je peux vous aider ?")
  }

  if (excec['hello'] > 3) {
    return commander("Oui, je vous écoute nous sommes à votre service ?")
  }

  return commander("Bonjour,")
}

var tiao = function() {
  console.log("Aurevoir et merci de votre visite!")
  process.exit();
}

hello();
