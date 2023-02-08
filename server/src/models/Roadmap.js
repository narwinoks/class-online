var Courses = require("./Courses");
module.exports = (sequelize, DataTypes) => {
  const Roadmap = sequelize.define(
    "Roadmap",
    {
      id: {
        type: DataTypes.INTEGER,
        autoIncrement: true,
        primaryKey: true,
        allowNUll: false,
      },
      logo: {
        type: DataTypes.STRING,
        allowNUll: false,
      },
      name: {
        type: DataTypes.STRING,
        allowNUll: false,
      },
      price: {
        type: DataTypes.DOUBLE,
        allowNUll: true,
      },
      description: {
        type: DataTypes.TEXT,
        allowNUll: true,
      },
      level: {
        type: DataTypes.ENUM,
        values: ["all-level", "beginner", "intermediate", "advanced"],
      },
      type: {
        type: DataTypes.STRING,
        allowNUll: true,
      },
      createdAt: {
        type: DataTypes.DATE,
        field: "created_at",
        allowNUll: false,
      },
      updatedAt: {
        type: DataTypes.DATE,
        field: "updated_at",
        allowNUll: false,
      },
    },
    {
      tableName: "roadmaps",
      timestamps: true,
    }
  );

  Roadmap.associate = (models) => {
    Roadmap.hasMany(models.Courses, {
      foreignKey: "roadmap_id",
    });
  };
  return Roadmap;
};
