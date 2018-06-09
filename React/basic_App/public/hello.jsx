var React = require('react');
var ReactDOM = require('react-dom');
var Greet = require('Greeter');

var message = "text from the message variuable dfkbalkgn jgbekrgkjerakl";

ReactDOM.render(
  <Greet testVar="abcdefghijk" mess={message}/>,
  document.getElementById('hello')

);
