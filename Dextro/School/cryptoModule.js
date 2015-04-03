var cryptoModules = function (argument) {
	// body...

var crypto = require('crypto');

var ciphers = crypto.getCiphers();

console.log(ciphers);
}

module.exports = cryptoModules; 