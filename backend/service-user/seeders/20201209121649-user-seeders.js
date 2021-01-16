'use strict';
const bcrypt = require('bcrypt');

module.exports = {
  up: async (queryInterface, Sequelize) => {
     await queryInterface.bulkInsert('users', [
       {
        name : "Ryan Hartadi",
        profession : "Backend Developers",
        role : "admin",
        email : "Ryanhartadi999@gmail.com",
        password : await bcrypt.hash("IbanezRG1" , 10),
        created_at : new Date(),
        updated_at : new Date(),
       },
       {
        name : "Agastya Amaranthine Safira",
        profession : "Mahasiswa",
        role : "student",
        email : "anthinexoxo@gmail.com",
        password : await bcrypt.hash("1" , 10),
        created_at : new Date(),
        updated_at : new Date(),
       },
    ]);
 
  },

  down: async (queryInterface, Sequelize) => {
   
     await queryInterface.bulkDelete('users', null, {});
     
  }
};
