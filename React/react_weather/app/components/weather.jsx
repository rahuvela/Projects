var React = require('react');
var WeatherForm = require('WeatherForm');
var WeatherMsg = require('WeatherMsg');
var Owm = require('Owm');
var Emodal = require('ErrorModal');


var Weather = React.createClass({

  getInitialState: function(){
    return{
      isLoading : false,
    }
  },

  handleSearch : function(value) {

    var that = this;
    this.setState({ isLoading : true,
                    errorMessage : undefined,
                  location:undefined,
                temp:undefined});
    Owm.getTemp(value).then(function (temp) {
      that.setState({
        location: value,
        temp: temp,
        isLoading : false
      });
    }, function (e) {
       that.setState({ isLoading : false,
                        errorMessage : e.message});
        //alert("Invalid City");
    });

    // this.setState({
    //   location : value,
    //   temp : 28,
    // });
  },

  componentDidMount : function(){
    //alert("here");alert("here1");
    var location = this.props.location.query.location;
    //alert(location);
    if(location && location.length > 0){
      //alert(location);
      this.handleSearch(location);
      window.location.hash = '#/';
    }
  },

  componentWillReceiveProps : function(newProps){
    var location = newProps.location.query.location;
    //alert(location);
    if(location && location.length > 0){
      //alert(location);
      this.handleSearch(location);
      window.location.hash = '#/';
    }

  },

  render: function(){

    var { isLoading, location, temp , errorMessage } = this.state;

    function renderMessage () {
      if (isLoading) {
        return <h3> Fetching</h3>;
      } else if (temp && location) {
        return <WeatherMsg locat = {location} temper = {temp} />;
      }
    }

    function renderError(){
      if (typeof errorMessage === 'string') {
        return ( <Emodal message={errorMessage}/>)
      }
    }

    return(
      <div>
        <h1 className="page-title">Weather App</h1>
        <WeatherForm onSearch={this.handleSearch}/>
        {renderMessage()}
        {renderError()}
      </div>
    );
  }
});

module.exports = Weather;
