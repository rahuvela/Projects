var React = require('react');


var WeatherMsg = ({locat, temper}) => {
  return(


    <div>
      <p>the weather in {locat} is {temper}</p>
    </div>
  );
};

module.exports = WeatherMsg;
