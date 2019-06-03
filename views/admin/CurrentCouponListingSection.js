const currentFile = require('./CurrentCouponListingSection.js');

////// NOTES /////////


////// INITIAL SETUP /////////

// assign, but also blank ajaxUrl and the others
let jQuery;
let fetch;
let ajaxUrl;

if (typeof module !== 'undefined') {
  jQuery = require('jquery');
  fetch = require("node-fetch");
  ajaxUrl = 'http://localhost/wptest2/wp-admin/admin-ajax.php';
}

// if browser context === true, re-assign ajaxUrl from the window object
if (typeof window !== 'undefined' && window.ajaxUrl) {
  ajaxUrl = window.ajaxUrl;
}

//////// JS FUNCTION DECLARATIONS /////////


const a = () => {
  return currentFile.b();
};


const b = () => {
  return 'original from b'
};



const callForCountOfTargets = async () => {
  const parameters = { action: 'callForCountOfTargets' };
  
  try {
    const ajaxResponse = await fetch(ajaxUrl, {
      method : 'POST',
      headers : {
        'Content-Type' : 'application/json'
      },
      body : JSON.stringify(parameters),
    });
  
    // .json() returns a resolved promise. The resolved value is a JSON object
    const countOfTargets = await ajaxResponse.json()
      .catch(e => console.log(e, `=====e=====`));
    return countOfTargets;
    
  }
  
  catch (e) {
    console.log(e, `=====error=====`);
  }
};




// const setCountOfTargets = function (response) {
//   countOfTargets = response;
//   return variable;
// };
// if (typeof module !== 'undefined') {
//   module.exports.setCountOfTargets = setCountOfTargets;
// }


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
  const encodedCount = callForCountOfTargets(jQueryObject);
  
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



const renderNewTableData = (jQuery, tableData) => {
  // target the trs with a foreach
  jQuery(".couponDataRow").each(dataPoint => {
    // design new tds
  
    console.log(`=====renderNewTableData TODO design the TDs to add=====`);
  })
};


// incrementSize should be negative for previous button
const getDataSelection = async (incrementSize, limit = 10) => {
  const ajaxResponse = await fetch(ajaxUrl, {
    method : 'POST',
    headers : {
      'Content-Type' : 'application/json',
    },
    body : JSON.stringify(
      {
        incrementSize,
        limit,
        action : 'queryDbForNewSelection'
      })
  });
  
  const newSelection = await ajaxResponse.json();
  return newSelection;
};


async function ajaxLoadTableData (resultMarker, limit = 10) {
  try {
    const records = await fetch(ajaxUrl, {
      method : 'POST',
      headers : { 'Content-Type' : 'application/json' },
      body : {
        action : 'queryDbForNewSelection',
        resultMarker,
        limit
      },
    }).then(response => response);
  
    return records;
  }
  
  catch (error) {
    console.log(error, `=====error in ajaxLoadTableData()=====`);
  }
}

/*
function ajaxLoadTableData2($, incrementSize, limit = 10) {
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
}*/


////// JQUERY DECLARATIONS //////

/*
const selectNewRecords = (jQueryObject, markerChange) => {
  
  // blank the table body
  jQueryObject('#couponTableBody').html('');
  
  const oldMarker = getResultMarker();
  console.log(oldMarker, `=====oldMarker=====`);
  const resultMarker = adjustResultMarker(markerChange, oldMarker);
  console.log(resultMarker, `=====resultMarker=====`);
  
  // load new ajax data into the view template
  // this function runs renderNewTableData() on success
  const newData = getDataSelection(markerChange);
  
  // update the resultMarker
  setResultMarker(resultMarker, markerChange);
  
  // re-render the table
  renderNewTableData(jQueryObject, newData);
};
*/






///// JQUERY CALLS /////

jQuery(document).ready(function($) {
  console.log(`====jquery loaded======`);

  // $('#previousButton').click(() => selectNewRecords($, -10));

  
  
});



////// EXPORTS //////
if (typeof module.exports !== 'undefined') {
  // parent functions
  exports.a = a;
  exports.b = b;
  exports.adjustResultMarker = adjustResultMarker;
  exports.ajaxLoadTableData = ajaxLoadTableData;
  exports.getResultMarker = getResultMarker;
  exports.setResultMarker = setResultMarker;
  exports.callForCountOfTargets = callForCountOfTargets;
  exports.renderNewTableData = renderNewTableData;

}

