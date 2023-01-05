import DateRangePicker from 'flowbite-datepicker/DateRangePicker';

export default () => {
    initRangeDatePickers();
}

const initRangeDatePickers = () => {
    const dateRangePickerEl = document.querySelectorAll('[rangepicker]');

    dateRangePickerEl.forEach(el => {
      if(el) {
          new DateRangePicker(el, {
              format: 'dd/mm/yyyy',
          }); 
        }
    });
}