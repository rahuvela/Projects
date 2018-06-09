var React = require('react');
var {Link, IndexLink} = require('react-router');

var Nav = (props) => {
  return(
      <div>
        <h1>
          In nav Bar
        </h1>
        <IndexLink to="/" activeClassName = "active" activeStyle = {{fontWeight : 'bold'}}>Weather</IndexLink>
        &nbsp;&nbsp;&nbsp;&nbsp;
        <Link to="/about" activeClassName = "active" activeStyle = {{fontWeight : 'bold'}}>About</Link>
        &nbsp;&nbsp;&nbsp;&nbsp;
        <Link to="/example" activeClassName = "active" activeStyle = {{fontWeight : 'bold'}}>Example</Link>
      </div>

  );
};

module.exports = Nav;
