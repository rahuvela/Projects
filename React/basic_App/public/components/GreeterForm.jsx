var React = require('react');

var Formcomponent = React.createClass({


  formUpdate:function(e){

    e.preventDefault();
    var upstr = this.refs.fval.value;
    var upmess = this.refs.ftext.value;

    var values = {}


    if (typeof upstr === 'string' && upstr.length >0 ){
      this.refs.fval.value = '';
      values.testVar = upstr;
      //this.props.updateName(upstr);

    }

    if (typeof upmess === 'string' && upmess.length >0 ){
      this.refs.ftext.value = '';
      values.mess = upmess;
      //this.props.updateName(upstr);

    }
      this.props.updateName(values);


  },

  render:function(){
    return(
      <div>
      <form onSubmit = {this.formUpdate}>
        <input type="text" ref= "fval" placeholder="enter value ehre"></input>
        <textarea ref="ftext" placeholder="enter value ehre"></textarea>
        <button>Submit</button>
      </form>
    </div>
    )
  }

});

module.exports = Formcomponent;
