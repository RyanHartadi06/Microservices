"use strict";
const bcrypt = require("bcrypt");

module.exports = {
  up: async (queryInterface, Sequelize) => {
    await queryInterface.bulkInsert("users", [
      {
        name: "ryan",
        profession: "Mahasiswa",
        role: "admin",
        email: "admin@admin.com",
        password: await bcrypt.hash("admin", 10),
        created_at: new Date(),
        updated_at: new Date(),
      },
      {
        name: "anthine",
        profession: "Mahasiswa",
        role: "student",
        email: "student@student.com",
        password: await bcrypt.hash("student", 10),
        created_at: new Date(),
        updated_at: new Date(),
      },
    ]);
  },

  down: async (queryInterface, Sequelize) => {
    await queryInterface.bulkDelete("users", null, {});
  },
};
