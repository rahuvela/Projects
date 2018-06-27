var React = require('react');
var ReactDOM = require('react-dom');
var {Router, Route, IndexRoute, hashHistory} = require('react-router');
var main = require('Main');

//load foundation
require('style!css!foundation-sites/dist/foundation.min.css');
$(document).foundation();

//load css
require('style!css!applicationstyles');

ReactDOM.render(
<Router history={hashHistory}>
    <Route path="/" component={main}>
    </Route>
</Router>,
  document.getElementById('hello')

);
