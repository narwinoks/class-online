"use strict";

/** @type {import('sequelize-cli').Migration} */
module.exports = {
  async up(queryInterface, Sequelize) {
    /**
     * Add seed commands here.
     *
     * Example:
     */
    await queryInterface.bulkInsert(
      "courses",
      [
        {
          name: "Basic Course Testing",
          certificate: true,
          thumbnail: "http://localhost:3001/images/basic-course-testing.jpg",
          type: "premium",
          status: "draft",
          price: 320000,
          level: "all-level",
          description: "Basic Course Testing Description",
          mentor_id: 1,
          roadmap_id: 1,
          created_at: new Date(),
          updated_at: new Date(),
        },
      ],
      {}
    );
  },

  async down(queryInterface, Sequelize) {
    /**
     * Add commands to revert seed here.
     *
     * Example:
     */
    await queryInterface.bulkDelete("courses", null, {});
  },
};
