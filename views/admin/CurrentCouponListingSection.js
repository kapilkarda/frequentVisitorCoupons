console.log(`=====line 1 CCLS.js=====`);

const getResultMarker = () => {
  return localStorage.getItem('resultMarker')
};

const setResultMarker = (currentValue, incrementSize) => {
  console.log(currentValue, `=====currentValue=====`);
  console.log(incrementSize, `=====incrementSize=====`);
  
  const sum = currentValue + incrementSize;
  console.log(sum, `=====sum=====`);
  localStorage.setItem('resultMarker', sum);
  
  return sum;
};

const adjustResultMarker = (incrementSize, currentMarker, limit) => {
  console.log(currentMarker, `=====currentMarker=====`);
  if (!currentMarker || typeof currentMarker !== "number") {
    return 0
  } else if (currentMarker < 0) {
    return 0
  } else if (
    incrementSize < 0 &&
    currentMarker - limit <= 0
  ) {
    return 0
  }
  else return currentMarker;
};
if (typeof module !== 'undefined') {
  module.exports.adjustResultMarker = adjustResultMarker;
}




console.log(`=====line above renderTableData=====`);
const renderNewTableData = (jQuery, tableData) => {
  // target the trs with a foreach
  jQuery(".couponDataRow").each(dataPoint => {
    // design new tds
  })
};


// incrementSize should be negative for previous button
function ajaxLoadTableData($, incrementSize, limit = 10) {
  console.log(`=====ajax table load attempted=====`);
  
  // get and update the result marker to avoid invalid markations
  const oldMarker = getResultMarker();
  console.log(oldMarker, `=====oldMarker=====`);
  const resultMarker = adjustResultMarker(incrementSize, oldMarker, limit);
  console.log(resultMarker, `=====resultMarker=====`);
  
  // send an ajax request to get the new results
  $.post(
    ajaxUrl, // defined one file higher
    {
      limit,
      resultMarker,
      action : 'queryDbForNewSelection'
    },
    successResponse => {
      console.log(successResponse, `=====successResponse=====`);
      
      // update the resultMarker
      setResultMarker(resultMarker, incrementSize);
      
      // re-render the table
      renderNewTableData($, successResponse);
    },
    'json'
  );
  
}

///// JQUERY FUNCTIONS /////
jQuery(document).ready(function($) {
  console.log(`====jquery loaded======`);

  $('#previousButton').click(function() {
    console.log(`=====CLICK=====`);
    $('#couponTableBody').html('');
    ajaxLoadTableData($, -10);
  });
  
  $('#nextButton').click(function() {
    console.log(`=====CLICK=====`);
    $('#couponTableBody').html('');
    ajaxLoadTableData($, 10);
  })
});


