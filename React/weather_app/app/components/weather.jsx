var React = require('react');
var WeatherForm = require('WeatherForm');
var WeatherMsg = require('WeatherMsg');
var Owm = require('Owm');


var Weather = React.createClass({

  getInitialState: function(){
    return{
      isLoading : false,
    }
  },

  handleSearch : function(value) {

    var that = this;
    this.setState({ isLoading : true});
    Owm.getTemp(value).then(function (temp) {
      that.setState({
        location: value,
        temp: temp,
        isLoading : false
      });
    }, function (errorMessage) {
       that.setState({ isLoading : false});
        alert("Invalid City");
    });

    // this.setState({
    //   location : value,
    //   temp : 28,
    // });
  },

  render: function(){

    var { isLoading, location, temp } = this.state;

    function renderMessage () {
      if (isLoading) {
        return <h3> Fetching</h3>;
      } else if (temp && location) {
        return <WeatherMsg locat = {location} temper = {temp} />;
      }
    }

    return(
      <div>
        <h1>Weather jsx</h1>
        <WeatherForm onSearch={this.handleSearch}/>
        {renderMessage()}
      </div>
    );
  }
});

module.exports = Weather;
