// mock jQuery and its methods
// const ready = jest.fn();
// const jQuery = jest.fn({ ready });
global.fetch = require('jest-fetch-mock');
const targetFile = require("../CurrentCouponListingSection.js");




////// FILE SCOPE SETUP //////

// const localStorageMock = {
//   getItem : jest.fn()
// };
//
// global.localStorage = localStorageMock;


// Applies to all tests in this file
// beforeEach(() => {
//   fetch.resetMocks();
//
// });



// no real point to testing this
// test('callForCountOfTargets', () => {
//   expect(testFile.callForCountOfTargets(jQuery));
//   expect(testFile.setCountOfTargets())
//     .toHaveBeenCalled();
// });


// test('setCountOfTargets', () => {
//   expect(testFile.setCountOfTargets(13, undefined))
//     .toEqual(13);
// });


////// TESTS //////


// describe('', () => {
//   beforeEach(() => {
//     global.localStorage = {
//       getItem : jest.fn(() => 3)
//     };
//   });
//
//   test('getResultMarker', () => {
//
//     console.log(global.localStorage.getItem(1), `=====global.localStorage.getItem()=====`);
//
//     console.log(global.localStorage, `=====global.localStorage=====`);
//
//     expect(targetFile.getResultMarker()).toEqual(7);
//   });
// });
//
// test('spyOn', () => {
//   jest.spyOn(window.localStorage.__proto__, 'getItem');
//   window.localStorage.__proto__.getItem = jest.fn();
//
//   localStorage.getItem('');
//   expect(localStorage.getItem).toEqual(3);
//
// });



// test('callForCountOfTargets', done => {
//   // mock fetch to return 13
//   const mockFetch = fetch.mockResponse(JSON.stringify({data : 13}));
//   // console.log(mockFetch, `=====mockFetch=====`);
//
//   //
//   targetFile
//     .callForCountOfTargets()
//     .then(response => {
//       // console.log(response, `=====response=====`);
//       expect(response.data).toEqual(13);
//       done();
//   })
//
// });


// test('a and b', () => {
//   // console.log(targetFile.b(), `=====b()=====`);
//   const b = jest.spyOn(targetFile, 'b');
//   const a = jest.spyOn(targetFile, 'a');
//   console.log(a(), `=====a() before mocking b=====`);
//
//   b.mockReturnValueOnce('mockd value');
//
//   expect(a()).toEqual('mockd value');
// });





// test('getResultMarker', () => {
//
//   let x = jest.fn()
//   x.mockReturnValue('test');
//   console.log(x(), `=====x=====`);
//
//   expect(x()).toEqual('tst'); // fails, undefined
//
//   // let localStorage = {};
//   // localStorage.getItem = jest.fn();
//   // localStorage.getItem.mockReturnValue = 29;
//   // console.log(localStorage.getItem(), `=====localStorage.getItem()=====`);
//   // console.log(localStorage.getItem, `=====localStorage.getItem=====`);
//
//   // expect(localStorage.getItem()).toStrictEqual(28);
//
// });



test('testF', async () => {
  await fetch.mockResponseOnce(JSON.stringify(2));

  await targetFile.testF().then(jsonData => {
    expect(jsonData).toEqual(2)
  });
});



const callForCountOfTargets = () => {
  const parameters = { action: 'callForCountOfTargets' };
  
  try {
    const ajaxResponse = fetch('', {
      method : 'POST',
      headers : {
        'Content-Type' : 'application/json'
      },
      body : JSON.stringify(parameters),
    })
      .then(res => res.json())
      .catch(e => console.log(e, `=====e=====`));
    
    return ajaxResponse;
  }
  
  catch (e) {
    console.log(e, `=====error=====`);
  }
};

test.skip('callForCountOfTargets', async () => {
  await fetch.mockResponseOnce(JSON.stringify(5));
  
  await targetFile.callForCountOfTargets()
    .then(jsonData => {
      // expect(fetch.mock.calls.length).toEqual(4);
      expect(jsonData).toEqual(3)
    })
});




test.skip('adjustResultMarker', () => {
  
  // returned promise
  const callForCountOfTargets = jest.spyOn(targetFile, 'callForCountOfTargets');
  callForCountOfTargets.mockImplementationOnce(() => 12);
  console.log(callForCountOfTargets(), `=====callForCountOfTargets=====`);
  console.log(callForCountOfTargets(), `=====callForCountOfTargets=====`);
  
  
  expect(targetFile.adjustResultMarker(10, 0, 10)).toStrictEqual(0);
  expect(targetFile.adjustResultMarker(10, 23, 10)).toStrictEqual(23);
  expect(targetFile.adjustResultMarker(-10, 5, 10)).toStrictEqual(0);
  
  
});




