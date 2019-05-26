////// NOTES /////////


////// INITIAL SETUP /////////

// let ajaxUrl;

if (typeof 'module' !== 'undefined') {
  // let jQuery = null;
  let ajaxUrl = 'http://test.com'
}


//////// JS FUNCTION DECLARATIONS /////////

const callForCountOfTargets = (jQuery) => {
  console.log(`=====callForCountOfTargets=====`);
  let countOfTargets;
  console.log(countOfTargets, `=====countOfTargets=====`);
  
  jQuery.ajax(
    ajaxUrl,
    {
      method: 'POST',
      async: false, // key for the return to work
      dataType: 'json',
      data: {
        action: 'callForCountOfTargets',
      },
      success: response => { countOfTargets = response; },
      error: error => console.log(error, `=====error=====`),
    }
  );
  
  console.log(countOfTargets, `=====countOfTargets=====`);
  return countOfTargets;
};
if (typeof module !== 'undefined') {
  module.exports.callForCountOfTargets = callForCountOfTargets;
}


const setCountOfTargets = function (response) {
  countOfTargets = response;
  return variable;
};
if (typeof module !== 'undefined') {
  module.exports.setCountOfTargets = setCountOfTargets;
}


const getResultMarker = () => {
  return localStorage.getItem('resultMarker')
};

const setResultMarker = (currentValue, incrementSize) => {
  
  const sum = currentValue + incrementSize;
  localStorage.setItem('resultMarker', sum);
  
  return sum;
};

const adjustResultMarker = (incrementSize, currentMarker, limit, jQueryObject) => {
  
  // see what the upper limit is
  $encodedCount = callForCountOfTargets(jQueryObject);
  
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
  const resultMarker = adjustResultMarker(incrementSize, oldMarker, limit, $);
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


////// JQUERY DECLARATIONS //////

const selectNewRecords = (jQueryObject, markerChange) => {
  
  // blank the table body
  jQueryObject('#couponTableBody').html('');
    
  // load new ajax data into the view template
  // this function runs renderNewTableData() on success
  ajaxLoadTableData(jQueryObject, markerChange);
};






///// JQUERY CALLS /////

jQuery(document).ready(function($) {
  console.log(`====jquery loaded======`);

  $('#previousButton').click(() => selectNewRecords($, -10));

  $('#nextButton').click(() => selectNewRecords($, 10))
  
});


