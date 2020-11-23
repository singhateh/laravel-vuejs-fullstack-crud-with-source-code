<template>
<div>
    <!-- Just an image -->
<nav class="navbar navbar-light bg-info mt-3">
  <a class="navbar-brand" href="#">
    <img :src="getlaravelLogo()" width="40" height="40" alt="" loading="lazy">
    <img :src="getapiLogo()" width="40" height="40" alt="" loading="lazy">
    <img :src="getvueLogo()" width="40" height="40" alt="" loading="lazy" class="pull-right" style="float:right">
  </a>
  <FlashMessage></FlashMessage>
</nav>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
      </li>
      <li class="nav-item">
      </li>
      <li class="nav-item">
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button type="button" class="btn btn-outline-success my-2 my-sm-0" >Search</button>
    </form>
  </div>
</nav>

<h2 style="font-family:times new romans; font-weight:bold">Add New </h2>
    <form @submit.prevent="addStudent" class="mb-3">
        <div class="row">
      <div class="form-group">
          <div class="col-md-12">
        <input type="text" autofocus="autofocus" class="form-control" placeholder="First Name" v-model="student.first_name" autocomplete="off">
      </div>
      </div>
       <div class="form-group">
          <div class="col-md-12">
        <input type="text" class="form-control" placeholder="Last Name" v-model="student.last_name" autocomplete="off">
      </div>
      </div>
        <div class="form-group">
          <div class="col-md-12">
              <select name="" class="form-control" id="" v-model="student.gender">
                  <option value="">-----</option>
                  <option value="male">Male</option>
                  <option value="female">Female</option>
              </select>
      </div>
      </div>
        <div class="form-group">
          <div class="col-md-12">
        <select name="" class="form-control" v-model="student.country">
                  <option value="">-----</option>
                  <option value="The Gambia">The Gambia</option>
                  <option value="Indonesia">Indonesia</option>
                  <option value="usa">United State</option>
                  <option value="australia">Australia</option>
              </select>
      </div>
      </div>
        <div class="form-group">
          <div class="col-md-12">
       <select name="" class="form-control"  v-model="student.class">
                  <option value="">-----</option>
                  <option value="class A">Class A</option>
                  <option value="class B">Class B</option>
                  <option value="class C">Class C</option>
                  <option value="class D">Class D</option>
              </select>
      </div>
      </div>
      <div class="form-group">
        <div class="col-md-12">
       <input type="text" class="form-control" placeholder="Phone Number" v-model="student.phone" autocomplete="off">
      </div>
      </div>
      <!-- <div class="form-group"> -->
        <!-- <div class="col-md-12"> -->
        <!-- <div class="col-lg-6 col-md-6" id="get_avater">
        <input type="file" @change="upload_avatar"  name="image">
        <div class="avatar img-fluid img-circle" style="margin-top:10px">
            <img :src="get_avatar()" v-bind:style="student.styleObject"/>
        </div>
        </div> -->
       <!-- <input type="file" class="form-control" v-file="student.image" autocomplete="off" name="image">
      </div> -->
      <!-- </div> -->
      <!-- <div class="form-group">
        <div class="col-md-12">
            <img :src="getstudentProfile()" alt="" v-bind:style="student.styleObject">
      </div>
      </div> -->
      </div>
          <div class="form-row">
    <div class="form-group col-md-6">
      <button id="submit" type="submit" class="btn btn-outline-success btn-block">Save</button>
          </div>
          <div class="form-group col-md-6">
    <button type="button" @click="clearForm()" class="btn btn-outline-danger btn-block">Refresh</button>
          </div>
          </div>
    </form>

  <div class="card">
     <div class="card-body">
         <div class="card-header bg-primary" style="text-transform:uppercase;  color:#fff; font-size:25px; font-family:times new romans; text-align:center">LARAVEL VUE CRUD <b>API</b> APP </div>
      <table class="table table-bordered">
          <thead>
              <tr>
              <th>Student Name</th>
              <th>Gender</th>
              <th>Phone</th>
              <th>Class</th>
              <th>Country</th>
              <th class="text-right">Action</th>
              </tr>
          </thead>
          <tbody>
              <tr v-for="student in students" v-bind:key="student.id">
              <td>{{student.first_name + ' ' + student.last_name}}</td>
              <td>{{student.gender}}</td>
              <td>{{student.phone}}</td>
              <td>{{student.class}}</td>
              <td>{{student.country}}</td>
              <td>
                <a @click="editStudent(student)"  class="btn btn-info btn-xs" href="#" ><i class="fa fa-pencil "></i> </a>
                <a @click="deleteStudent(student.id)" class="btn btn-danger btn-xs" href="#"> <i class="fa fa-trash text-red"></i></a></td>

              </tr>
          </tbody>
      </table>
         <nav aria-label="Page navigation example">
      <ul class="pagination">
        <li v-bind:class="[{disabled: !pagination.prev_page_url}]" class="page-item"><a class="page-link" href="#" @click="fetchStudents(pagination.prev_page_url)">Previous</a></li>

        <li class="page-item disabled"><a class="page-link text-dark" href="#">Page {{ pagination.current_page }} of {{ pagination.last_page }}</a></li>
    
        <li v-bind:class="[{disabled: !pagination.next_page_url}]" class="page-item"><a class="page-link" href="#" @click="fetchStudents(pagination.next_page_url)">Next</a></li>
      </ul>
    </nav>
      </div>
  </div>

</div>

</template>

<style>
.image{
    width: 30px !important;
}
td{
    font-family:Arial, Helvetica, sans-serif;
    font-size: 18px;
    text-align: center;
}
th{
    font-family:Arial, Helvetica, sans-serif;
    font-size: 18px;
    text-align: center;
}
</style>



<script>

export default {
  data() {
    return {
      students: [],
      student: {
      first_name: '',
      last_name: '',
      gender: '',
      country: '',
      class: '',
      phone: '',
      image: '',
      styleObject: {
                   width: '100px',
                   height: '100px'
                }
      },
      student_id: '',
      pagination: {},
      edit: false,
      get_avater: true
        
    };
  },

  created() {
    this.fetchStudents();
  },

  methods: {

        upload_avatar(e){
              let file = e.target.files[0];
                let reader = new FileReader();  

                if(file['size'] < 2111775)
                {
                    reader.onloadend = (file) => {
                    //console.log('RESULT', reader.result)
                     this.student.image = reader.result;
                    }              
                     reader.readAsDataURL(file);
                }else{
                    alert('File size can not be bigger than 2 MB')
                }
            },
             //For getting Instant Uploaded Photo
            get_avatar(){
               let photo = (this.student.image) ? this.student.image : "images/students/"+ this.student.image;
               return photo;
            },

      getstudentProfile(){
          return "images/students/" + this.student.image;
      },

      getvueLogo(){
          return "images/vue.jpeg";
      },
       getlaravelLogo(){
          return "images/laravel.png";
      },

       getapiLogo(){
          return "images/api.png";
      },


    fetchStudents(page_url) {
      let paginate = this;
      page_url = page_url || '/api/v1/students';
      fetch(page_url)
        .then(res => res.json())
        .then(res => {
          this.students = res.data;
          paginate.makePagination(res.meta, res.links);
        })
        .catch(err => console.log(err));
    },


    makePagination(meta, links) {
      let pagination = {
        current_page: meta.current_page,
        last_page: meta.last_page,
        next_page_url: links.next,
        prev_page_url: links.prev
      };

      this.pagination = pagination;
    },
    showModal(student) {
          this.student.id = student.id;
          this.student.student_id = student.id;
            $('#studentDeleteModal').modal('show');
        },
    deleteStudent(id) {
         
      if (confirm('Are You Sure You Want to Delete?' )) {
        fetch(`api/v1/students/${id}`, {
          method: 'delete'
        })
          .then(res => res.json())
          .then(data => {
            alert('Student Removed Successfully!');
            this.fetchStudents();
          })
          .catch(err => console.log(err));
      }
    },



    // Add New Student

    addStudent() {
      if (this.edit === false) {
        // Add
        fetch('api/v1/students', {
          method: 'post',
          body: JSON.stringify(this.student),
          headers: {
            'content-type': 'application/json'
          }
        })
          .then(res => res.json())
          .then(data => {
            this.clearForm();
            alert('Student Added Successfully');
            this.fetchStudents();
            // this.flashMessage.success({
            //     title: 'Success',
            //     message: 'Student Added Successfully!',
            //     time: 5000
            // });
            

          })
          .catch(err => console.log(err));
      } else {
        // Update
        fetch('api/v1/students', {
          method: 'put',
          body: JSON.stringify(this.student),
          headers: {
            'content-type': 'application/json'
          },
          
        })
          .then(res => res.json())
          .then(data => {
            this.clearForm();
            alert('Student Updated Successfully!');
            this.fetchStudents();
          })
          .catch(err => console.log(err));
      }
    },
    editStudent(student) {
      this.edit = true;
      this.student.id = student.id;
      this.student.student_id = student.id;
      this.student.first_name = student.first_name;
      this.student.last_name = student.last_name;
      this.student.gender = student.gender;
      this.student.phone = student.phone;
      this.student.country = student.country;
      this.student.class = student.class;
      this.student.image = student.image;
      $('#submit').text('Update');
     
    },
    showStudent(student) {
    //   this.edit = true;
      this.student.id = student.id;
      this.student.student_id = student.id;
      this.student.first_name = student.first_name;
      this.student.last_name = student.last_name;
      this.student.gender = student.gender;
      this.student.phone = student.phone;
      this.student.country = student.country;
      this.student.class = student.class;
      this.student.image = student.image;
    },
    clearForm() {
      this.edit = false;
      this.student.id = null;
      this.student.student_id = null;
      this.student.first_name = '';
      this.student.last_name = '';
      this.student.gender = '';
      this.student.phone = '';
      this.student.country = '';
      this.student.class = '';
      this.student.image = '';
      $('#submit').text('Save');
    }
  }
};

$(document).ready(function(){
   if (this.edit === false) {
        $("#get_avater").hide();
    }
    
})
</script>
