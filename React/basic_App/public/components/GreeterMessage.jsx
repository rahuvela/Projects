var React = require('react');

var Textar = React.createClass({

  render:function(){
    var opfiled = this.props.upVal;
    var messfield = this.props.upMess;
    return(

      <div>
        <h1>Some text {opfiled}</h1>
        <p>The passage : {messfield}</p>
      </div>

    ) }
});

module.exports = Textar;
