var React = require('react');

var WeatherForm = React.createClass({
  onFormSbmit: function(e){
    e.preventDefault();
    var loca = this.refs.loc.value;

    if(loca.length > 0){
      this.refs.loc.value = '';
      this.props.onSearch(loca);
    }
  },

  render: function(){
    return(


      <div>
        <form onSubmit={this.onFormSbmit}>
          <input type='text' name='city' placeholder = 'Enter City Name' ref='loc'></input>
          <button className="button expanded">Get Weather!</button>

        </form>
      </div>
    );
  }
});

module.exports = WeatherForm;
