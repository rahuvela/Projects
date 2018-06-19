var React = require('react');
var {Link} = require('react-router');

var Examples = (props) => {
  return(
    <div>
      <h1 className='text-center'>Examples jsx</h1>
      <ol>
        <li>
          <Link to='?location=Delhi'>Delhi</Link>
        </li>
        <li>
          <Link to='?location=Austin'>Austin</Link>
        </li>
      </ol>
    </div>
  );
};

module.exports = Examples;
