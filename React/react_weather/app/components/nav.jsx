var React = require('react');
var {Link, IndexLink} = require('react-router');

var Nav = React.createClass({

  navSearch : function(e){
    e.preventDefault();
    var navVal = this.refs.navvalue.value;
    //alert(navVal);
    var encodedLoc = encodeURIComponent(navVal);

    if(navVal.length > 0){
      this.refs.navvalue.value = '';
      window.location.hash = '#/?location=' + encodedLoc;
    }


  },

  render: function(){
  return(
    <div className="top-bar">
        <div className="top-bar-left">
          <ul className="menu">
            <li className="menu-text">React Weather App</li>
          <li>
            <IndexLink to="/" activeClassName = "active" activeStyle = {{fontWeight : 'bold'}}>Weather</IndexLink>
          </li>
          <li>
            <Link to="/about" activeClassName = "active" activeStyle = {{fontWeight : 'bold'}}>About</Link>
          </li>
          <li>
            <Link to="/example" activeClassName = "active" activeStyle = {{fontWeight : 'bold'}}>Example</Link>
          </li>
        </ul>
      </div>
      <div className="top-bar-right">
        <form onSubmit={this.navSearch}>
          <ul className="menu">
            <li><input type="search" placeholder="Search" ref="navvalue"></input></li>
            <li><button type="submit" className="button expanded">Search</button></li>
          </ul>

        </form>
      </div>
    </div>

  );
}
});

module.exports = Nav;
