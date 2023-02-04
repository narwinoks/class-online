module.exports = (sequelize, DataTypes) => {
  const MyCourses = sequelize.define(
    "MyCourses",
    {
      id: {
        type: DataTypes.INTEGER,
        autoIncrement: true,
        primaryKey: true,
        allowNUll: false,
      },
      user_id: {
        type: DataTypes.INTEGER,
        allowNUll: false,
      },
      course_id: {
        type: DataTypes.INTEGER,
        allowNUll: false,
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
      tableName: "my_courses",
      timestamps: true,
    }
  );
  return MyCourses;
};
