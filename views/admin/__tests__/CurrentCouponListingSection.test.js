const testFile = require("../CurrentCouponListingSection.js");

test('adjustResultMarker', () => {
  
  expect(testFile.adjustResultMarker(10, 0, 10)).toStrictEqual(0);
  expect(testFile.adjustResultMarker(10, 23, 10)).toStrictEqual(23);
  expect(testFile.adjustResultMarker(-10, 5, 10)).toStrictEqual(0);
});
