var React = require('react');
var ReactDOM = require('react-dom');
var ReactDOMServer = require('react-dom/server');

var ErrorModal = React.createClass({

  getDefaultProps: function(){
    return {
      title : 'error'
    };
  },

  propTypes: {
    title: React.PropTypes.string,
    message: React.PropTypes.string
  },

  componentDidMount: function(){
    var {title,message} = this.props;
    var modalMarkup = (
      <div id="emodal" className="reveal tiny text-center" data-reveal = "">
        <p>
          {title}
        </p>
        <p>
          {message}
        </p>
        <button className = "button hollow" data-close = "">
          Close!
        </button>

      </div>

    );

    var $modal = $(ReactDOMServer.renderToString(modalMarkup));
    $(ReactDOM.findDOMNode(this)).html($modal);

    var modal = new Foundation.Reveal($('#emodal'));
    modal.open();
  },

  render: function(){

    return(
      <div>

      </div>

    );
  }

});

module.exports = ErrorModal;
