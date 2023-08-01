const tablinks = document.getElementsByClassName("tab-links");       
const tabcontents = document.getElementsByClassName("tab-contents"); //retrieve the DOM elements with the class names and store them in the variables respectively.
function opentab(tabname,event){
  Array.from(tablinks).forEach(tablink => {
    tablink.classList.remove("active-link");
  });
  
  Array.from(tabcontents).forEach(tabcontent => {
    tabcontent.classList.remove("active-tab");      //creates an array, iterates over each element, and removes the "active" class from their classList.
  });

  event.currentTarget.classList.add("active-link"); //adds the "active-link" class to the current target of the event
  document.getElementById(tabname).classList.add("active-tab"); //finds the tab content element with the given tabname ById and adds the "active-tab" class to it. 
}
/* orginal idea from: https://www.youtube.com/watch?v=0YFrGy_mzjY&t=2533s modified the code by myself*/

// const search = () => {                                  //traditional way is function search() const cannot reassign while let can, both are block-scope,not hoisted while var can.
//   const searchbox = document.getElementById("search-course").value.toUpperCase(); //It retrieves the value of an input element
//   const course = document.querySelectorAll(".course"); //css selector. It selects all elements with the class name "course"and stores them in the course variable.
//   const cname = document.getElementsByTagName("h2"); //It retrieves all the h2 elements and stores them in the cname variable.

//     for(let i=0; i<cname.length; i++){
//         let match = course[i].getElementsByTagName('h2')[0]; //it retrieves the first h2 element within the current course and stores it in the match variable.
//         if(match){
//             let textvalue = match.textContent || match.innerHTML //If match exists, it retrieves the text content of match or html markup and stores it in the textvalue variable.
//             if (textvalue.toUpperCase().indexOf(searchbox) > -1){ //It checks if the textvalue contains the search value obtained from the input box. 
//                 course[i].style.display = ""; //If it does, it sets to an empty string, showing it
//             }else{
//                 course[i].style.display = "none"; //Otherwise, hiding the course element.
//             }
//         }
//     }
// } old version

const search = () => {
  const searchbox = document.getElementById("search-course").value.toLowerCase(); //It retrieves the value of an input element
  const course = document.querySelectorAll(".course"); //css selector. It selects all elements with the class name "course"and stores them in the course variable.

  course.forEach((courseElement) => {  //forEach() method is used to iterate over the course collection.
    const match = courseElement.querySelector("h2"); //it retrieves the first h2 element within the current course and stores it in the match variable.
    const textValue = match?.textContent;
    const doesContain = textValue?.toLowerCase().includes(searchbox); //return true or false

    courseElement.style.display = doesContain ? "" : "none";//If it does, it sets to an empty string, showing it Otherwise, hiding the course element.
  });
};
//optional chaining operator ? to safely access, prevents errors if a match or text content doesn't exist for a particular courseElement.


// const filterSelect = document.getElementById('filter');
// const filterList = document.getElementById('course-list');
// filterSelect.addEventListener('change', filterCourses);// Add event listener to the filter select element
// // window.addEventListener('DOMContentLoaded', () => {filterCourses();}); // Load all courses when the page is opened
// function filterCourses() {

//   const selectedFilter = filterSelect.value;  // Get the selected filter option
//   const courses = document.getElementsByClassName('course');  // Get all the course elements

//   for (let i = 0; i < courses.length; i++) {  // Iterate over the courses and show/hide based on the selected filter
//     const course = courses[i];
//     const level = course.querySelector('h3').textContent;

//     if (selectedFilter === 'level1' && level === 'Level 1') {
//       course.style.display = 'block';
//     } else if (selectedFilter === 'level2' && level.includes('Level 2')) {
//       course.style.display = 'block';
//     } else if (selectedFilter === 'default') {
//       course.style.display = 'block';
//     } else {
//       course.style.display = 'none';
//     }
//   }
// } old version

const filterSelect = document.getElementById('filter');
const filterList = document.getElementById('course-list');
filterSelect.addEventListener('change', filterCourses);

function filterCourses() {
  const selectedFilter = filterSelect.value;
  const courses = document.getElementsByClassName('course');

  Array.from(courses).forEach((course) => {
    const level = course.querySelector('h3').textContent;

    switch (selectedFilter) {
      case 'level1':
        course.style.display = level.includes ('Level 1') ? 'block' : 'none';
        break;
      case 'level2':
        course.style.display = level.includes ('Level 2') ? 'block' : 'none';
        break;
      case 'default':
        course.style.display = 'block';
        break;
      default:
        course.style.display = 'none';
        break;
    }
  });
}

const sortSelect = document.getElementById('sort');
const courseList = document.getElementById('course-list');
sortSelect.addEventListener('change', sortCourses); // Add an event listener to the sort select element to trigger the sortCourses() function when the selection changes.

function sortCourses() {
  const selectedSort = sortSelect.value; // Get the selected sort option
  const courses = Array.from (document.getElementsByClassName('course')); // Get all the course elements
  //converts the HTMLCollection into a regular JavaScript array. This allows to use array methods to iterate or manipulate the elements more conveniently.

  if (selectedSort === 'lowtohigh'|| selectedSort === 'default') {
    courses.sort((a, b) => {
      const levelA = a.querySelector('h3').textContent;
      const levelB = b.querySelector('h3').textContent;
      return levelA.localeCompare(levelB); //-1
    });
  } else if (selectedSort === 'hightolow') {
    courses.sort((a, b) => {
      const levelA = a.querySelector('h3').textContent;
      const levelB = b.querySelector('h3').textContent;
      return levelB.localeCompare(levelA); //1
    });
  }
  // Remove existing course elements from the course list container
    courseList.innerHTML = '';
  // another way to use the loop 
  // while (courseList.firstChild) {courseList.removeChild(courseList.firstChild);}

  // Append the sorted courses back to the course list container
    courses.forEach(course => {
      courseList.appendChild(course);
    });
}
