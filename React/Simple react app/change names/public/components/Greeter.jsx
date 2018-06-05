var React = require('react');
var Textar = require('GreeterMessage');
var Formcomponent = require('GreeterForm');

var Greet = React.createClass({

  getDefaultprops: function() {
    return{
      testVar:'default1',
      mess:'default2',
    };
  },

  getInitialState: function() {
    return{
        testVar : this.props.testVar,
        mess : this.props.mess
    };
  },



  handleNewName: function(values){

    this.setState(values);

  },

  render:function(){

    var grabo = this.state.testVar;
    var def2 = this.state.mess;
    return (
      <div>
        <Textar upVal={grabo} upMess={def2}/>
        <Formcomponent updateName={this.handleNewName}/>
      </div>
    )
  }
}

);


module.exports = Greet;
