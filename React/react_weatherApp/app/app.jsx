var React = require('react');
var ReactDOM = require('react-dom');
var {Router, Route, IndexRoute, hashHistory} = require('react-router');

var main = require('Main');
var Weather = require('Weather');
var about = require('About');
var example = require('Example');

ReactDOM.render(
<Router history={hashHistory}>
    <Route path="/" component={main}>
      <Route path="/about" component={about}/>
      <Route path="/example" component={example}/>
      <IndexRoute component={Weather}/>

    </Route>
</Router>,
  document.getElementById('hello')

);
