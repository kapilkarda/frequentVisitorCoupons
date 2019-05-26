
// no classes
const jQuery = {
  
  ajax : (url, config) => {
    if (config.data.action === 'callForCountOfTargets') {
      const success = config.success(13, undefined);
      console.log(success, `=====success=====`);
    }
  }
  
  
};
module.exports = jQuery;