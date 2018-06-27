var React = require('react');

var Main = (props) => {
  return(
    <div>
      <div>
        <p>Main jsx rendered</p>
        <div>
          {props.children}
        </div>

      </div>

    </div>
  );
};

module.exports = Main;
