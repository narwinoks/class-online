"use strict";
// const {Mentor} = require("../../models");
/** @type {import('sequelize-cli').Migration} */
module.exports = {
  async up(queryInterface, Sequelize) {
    await queryInterface.createTable("courses", {
      id: {
        type: Sequelize.INTEGER,
        autoIncrement: true,
        primaryKey: true,
        allowNull: true,
      },
      name: {
        type: Sequelize.STRING,
        allowNull: false,
      },
      slug: {
        type: Sequelize.STRING,
        allowNull: false,
        unique: true,
      },
      certificate: {
        type: Sequelize.BOOLEAN,
        defaultValue: false,
      },
      thumbnail: {
        type: Sequelize.STRING,
        allowNull: true,
      },
      type: {
        type: Sequelize.ENUM,
        values: ["premium", "free"],
      },
      status: {
        type: Sequelize.ENUM,
        values: ["draft", "published"],
      },
      price: {
        type: Sequelize.DOUBLE,
        defaultValue: 0,
      },
      level: {
        type: Sequelize.ENUM,
        values: ["all-level", "beginner", "intermediate", "advanced"],
      },
      description: {
        type: Sequelize.TEXT,
        allowNull: true,
      },
      mentor_id: {
        type: Sequelize.INTEGER,
        allowNull: false,
      },
      roadmap_id: {
        type: Sequelize.INTEGER,
        allowNull: false,
      },
      category_id: {
        type: Sequelize.INTEGER,
        allowNull: false,
      },
      created_at: {
        type: Sequelize.DATE,
        allowNull: false,
      },
      updated_at: {
        type: Sequelize.DATE,
        allowNull: false,
      },
    });
  },

  async down(queryInterface, Sequelize) {
    await queryInterface.dropTable("courses");
  },
};
