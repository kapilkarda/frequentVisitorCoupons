const jQuery = require('../__mocks__/jQuery.js');
const testFile = require("../CurrentCouponListingSection.js");

// no real point to testing this
// test('callForCountOfTargets', () => {
//   expect(testFile.callForCountOfTargets(jQuery));
//   expect(testFile.setCountOfTargets())
//     .toHaveBeenCalled();
// });


test('setCountOfTargets', () => {
  expect(testFile.setCountOfTargets(13, undefined))
    .toEqual(13);
});


test('adjustResultMarker', () => {
  
  expect(testFile.adjustResultMarker(10, 0, 10)).toStrictEqual(0);
  expect(testFile.adjustResultMarker(10, 23, 10)).toStrictEqual(23);
  expect(testFile.adjustResultMarker(-10, 5, 10)).toStrictEqual(0);
});
